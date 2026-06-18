document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.toast').forEach(el => new bootstrap.Toast(el, {delay: 4000}).show())
})

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
