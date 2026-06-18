const NC_COLORS = {
  blue: '#87CEEB',
  pink: '#FFB6C1',
  mint: '#98D8C8',
  yellow: '#FFD700',
  dark: '#2D3436',
}

async function fetchAndRenderLine(canvasId, endpoint, label) {
  try {
    const res = await fetch(endpoint)
    const { labels, data } = await res.json()
    new Chart(document.getElementById(canvasId), {
      type: 'line',
      data: { labels, datasets: [{ label, data, borderColor: NC_COLORS.blue, backgroundColor: NC_COLORS.blue + '33', fill: true, tension: 0.4 }] },
      options: { responsive: true }
    })
  } catch {
    document.getElementById(canvasId)?.parentElement?.insertAdjacentHTML('beforeend', '<p>Chart unavailable</p>')
  }
}

async function fetchAndRenderBar(canvasId, endpoint, label) {
  try {
    const res = await fetch(endpoint)
    const { labels, data } = await res.json()
    new Chart(document.getElementById(canvasId), {
      type: 'bar',
      data: { labels, datasets: [{ label, data, backgroundColor: data.map((_, i) => i % 2 === 0 ? NC_COLORS.blue : NC_COLORS.mint) }] },
      options: { responsive: true }
    })
  } catch {
    document.getElementById(canvasId)?.parentElement?.insertAdjacentHTML('beforeend', '<p>Chart unavailable</p>')
  }
}

async function fetchAndRenderPie(canvasId, endpoint) {
  try {
    const res = await fetch(endpoint)
    const { labels, data } = await res.json()
    new Chart(document.getElementById(canvasId), {
      type: 'doughnut',
      data: { labels, datasets: [{ data, backgroundColor: Object.values(NC_COLORS) }] },
      options: { responsive: true }
    })
  } catch {
    document.getElementById(canvasId)?.parentElement?.insertAdjacentHTML('beforeend', '<p>Chart unavailable</p>')
  }
}

function renderStaticBar(canvasId, labels, data, label) {
  new Chart(document.getElementById(canvasId), {
    type: 'bar',
    data: { labels, datasets: [{ label, data, backgroundColor: data.map((_, i) => i % 2 === 0 ? NC_COLORS.blue : NC_COLORS.mint) }] },
    options: { responsive: true }
  })
}

window.NanhaCharts = { fetchAndRenderLine, fetchAndRenderBar, fetchAndRenderPie, renderStaticBar }
