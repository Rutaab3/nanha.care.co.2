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
    if (link.getAttribute('href') === currentPath) link.classList.add('active')
  })
})
