// Upgrade to Laravel Echo + Pusher for real-time. This is polling fallback.

let lastCount = 0

async function fetchUnreadCount() {
  try {
    const res = await fetch('/notifications/unread-count')
    const { count } = await res.json()
    const badge = document.getElementById('notifBadge')
    if (badge) {
      badge.textContent = count
      badge.style.display = count > 0 ? '' : 'none'
    }
    if (count > lastCount) {
      const dropdown = document.getElementById('notifDropdown')
      if (dropdown) {
        const html = await (await fetch('/notifications/latest')).text()
        dropdown.innerHTML = html
      }
    }
    lastCount = count
  } catch (e) {
    console.error('Notification poll failed', e)
  }
}

document.addEventListener('DOMContentLoaded', () => {
  fetchUnreadCount()
  setInterval(fetchUnreadCount, 30000)

  document.addEventListener('click', async e => {
    const link = e.target.closest('[data-notif-id]')
    if (link) {
      e.preventDefault()
      try {
        await fetch(`/notifications/mark-read/${link.dataset.notifId}`, { method: 'POST' })
      } catch (err) {
        console.error('Mark read failed', err)
      }
    }
  })

  const markAllBtn = document.getElementById('markAllRead')
  if (markAllBtn) {
    markAllBtn.addEventListener('click', async () => {
      try {
        await fetch('/notifications/mark-all-read', { method: 'POST' })
        const badge = document.getElementById('notifBadge')
        if (badge) { badge.textContent = '0'; badge.style.display = 'none' }
        lastCount = 0
      } catch (err) {
        console.error('Mark all read failed', err)
      }
    })
  }
})
