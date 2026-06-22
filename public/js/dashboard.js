function reinitContent() {
  const selectAll = document.getElementById('selectAll')
  const bulkActions = document.getElementById('bulkActions')
  const selectedCount = document.getElementById('selectedCount')

  if (selectAll) {
    selectAll.addEventListener('change', () => {
      document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = selectAll.checked)
      updateBulkActions()
    })
  }

  document.querySelectorAll('.row-checkbox').forEach(cb => {
    cb.addEventListener('change', updateBulkActions)
  })

  function updateBulkActions() {
    const checked = document.querySelectorAll('.row-checkbox:checked')
    if (bulkActions) bulkActions.style.display = checked.length > 0 ? 'block' : 'none'
    if (selectedCount) selectedCount.textContent = checked.length
  }

  document.querySelectorAll('[data-confirm-form]').forEach(btn => {
    btn.addEventListener('click', () => {
      const modalEl = document.getElementById('confirmModal')
      if (!modalEl) return
      const modal = new bootstrap.Modal(modalEl)
      modalEl.querySelector('.btn-confirm')?.addEventListener('click', () => {
        document.getElementById(btn.dataset.confirmForm)?.submit()
      }, { once: true })
      modal.show()
    })
  })

  document.querySelectorAll('.alert.auto-dismiss').forEach(el => {
    setTimeout(() => { bootstrap.Alert?.getInstance(el)?.close() }, 5000)
  })

  const currentPath = window.location.pathname
  document.querySelectorAll('.sidebar-nav a').forEach(link => {
    link.classList.toggle('active', link.getAttribute('href') === currentPath)
  })
}

document.addEventListener('DOMContentLoaded', () => {
  const sidebarToggle = document.getElementById('sidebarToggle')
  const sidebar = document.querySelector('.sidebar')
  const mainContent = document.querySelector('.main-content')

  if (sidebarToggle && sidebar && mainContent) {
    const saved = localStorage.getItem('sidebarCollapsed')
    if (saved === 'true') {
      sidebar.classList.add('collapsed')
      mainContent.classList.add('expanded')
    }
    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed')
      mainContent.classList.toggle('expanded')
      localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'))
    })
  }

  reinitContent()
})

/* ===== Quick AJAX Navigation ===== */
;(() => {
  const contentEl = document.getElementById('pageContent')
  if (!contentEl) return

  let isLoading = false

  async function loadPage(url) {
    if (isLoading) return
    isLoading = true

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
        reinitContent()
      }
    } catch (e) {
      window.location.href = url
    }

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
    if (!path.startsWith('/dashboard/')) {
      window.location.href = href
      return
    }

    e.preventDefault()
    history.pushState(null, '', href)
    loadPage(href)
  })

  window.addEventListener('popstate', () => loadPage(location.pathname))
})()
