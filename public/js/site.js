document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.toast').forEach(el => new bootstrap.Toast(el, {delay: 4000}).show())
})

/* ===== Quick AJAX Navigation ===== */
;(() => {
  const contentEl = document.getElementById('pageContent')
  if (!contentEl) return

  let isLoading = false

  function getSkeletonId(url) {
    const path = new URL(url, location.origin).pathname
    return path.startsWith('/auth/') ? 'skeletonAuth' : 'skeletonPublic'
  }

  function showSkeleton(url) {
    const id = getSkeletonId(url)
    document.querySelectorAll('[id^=skeleton]').forEach(el => el.classList.add('d-none'))
    const skel = document.getElementById(id)
    if (skel) skel.classList.remove('d-none')
    contentEl.classList.add('d-none')
  }

  function showContent() {
    document.querySelectorAll('[id^=skeleton]').forEach(el => el.classList.add('d-none'))
    contentEl.classList.remove('d-none')
  }

  async function loadPage(url) {
    if (isLoading) return
    isLoading = true
    showSkeleton(url)

    try {
      const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      const html = await res.text()
      const parser = new DOMParser()
      const doc = parser.parseFromString(html, 'text/html')
      const newContent = doc.querySelector('#pageContent')

      if (newContent) {
        contentEl.innerHTML = newContent.innerHTML
        document.title = doc.title
        window.scrollTo({ top: 0, behavior: 'smooth' })
        document.querySelectorAll('.toast').forEach(el => new bootstrap.Toast(el, {delay: 4000}).show())
      }
    } catch (e) {
      window.location.href = url
    }

    showContent()
    isLoading = false
  }

  document.addEventListener('click', e => {
    const link = e.target.closest('a[href]')
    if (!link) return
    const href = link.getAttribute('href')
    if (!href || href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:')) return
    if (link.hostname && link.hostname !== location.hostname) return
    if (link.hasAttribute('download') || link.hasAttribute('data-bs-toggle') || link.getAttribute('role') === 'tab') return
    if (link.getAttribute('target') === '_blank') return

    const path = link.pathname || new URL(href, location.origin).pathname
    if (path.startsWith('/dashboard/')) {
      window.location.href = href
      return
    }

    e.preventDefault()
    history.pushState(null, '', href)
    loadPage(href)
  })

  window.addEventListener('popstate', () => loadPage(location.pathname))
})()

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', e => {
    e.preventDefault()
    document.querySelector(anchor.getAttribute('href'))?.scrollIntoView({behavior: 'smooth'})
  })
})

window.addEventListener('scroll', () => {
  document.querySelector('.navbar')?.classList.toggle('scrolled', window.scrollY > 50)
})

document.querySelectorAll('[data-confirm]').forEach(el => {
  el.addEventListener('click', e => {
    if (!confirm(el.dataset.confirm)) e.preventDefault()
  })
})

document.querySelectorAll('input[type=file][data-preview]').forEach(input => {
  input.addEventListener('change', () => {
    const img = document.getElementById(input.dataset.preview)
    if (img && input.files?.[0]) {
      const reader = new FileReader()
      reader.onload = e => img.src = e.target.result
      reader.readAsDataURL(input.files[0])
    }
  })
})
