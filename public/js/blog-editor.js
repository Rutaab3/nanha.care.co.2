function slugify(text) {
  return text.toLowerCase().trim().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '')
}

function updateReadTime(text) {
  const wordCount = text.trim().split(/\s+/).filter(Boolean).length
  const readTime = Math.max(1, Math.ceil(wordCount / 200))
  const input = document.getElementById('read_time_minutes')
  const display = document.getElementById('readTimeDisplay')
  if (input) input.value = readTime
  if (display) display.textContent = readTime + ' min read'
}

document.addEventListener('DOMContentLoaded', () => {
  const contentInput = document.getElementById('content')
  if (contentInput) {
    contentInput.addEventListener('input', () => updateReadTime(contentInput.value))
    updateReadTime(contentInput.value)
  }

  const titleInput = document.getElementById('title')
  const slugInput = document.getElementById('slug')
  if (titleInput && slugInput) {
    slugInput.dataset.auto = 'true'
    titleInput.addEventListener('input', () => {
      if (slugInput.dataset.auto === 'true') {
        slugInput.value = slugify(titleInput.value)
      }
    })
    slugInput.addEventListener('input', () => {
      slugInput.dataset.auto = slugInput.value === slugify(titleInput.value) ? 'true' : 'false'
    })
  }

  const excerpt = document.getElementById('excerpt')
  const excerptCount = document.getElementById('excerptCount')
  if (excerpt && excerptCount) {
    const updateCount = () => {
      const remaining = 200 - excerpt.value.length
      excerptCount.textContent = remaining + ' chars remaining'
      excerptCount.style.color = remaining < 20 ? 'red' : ''
    }
    excerpt.addEventListener('input', updateCount)
    updateCount()
  }

  const coverInput = document.getElementById('cover_image')
  if (coverInput) {
    coverInput.addEventListener('change', () => {
      const preview = document.getElementById('coverPreview') || (() => {
        const img = document.createElement('img')
        img.id = 'coverPreview'
        img.style.maxWidth = '100%'
        img.style.marginTop = '10px'
        coverInput.parentNode.appendChild(img)
        return img
      })()
      if (coverInput.files?.[0]) {
        const reader = new FileReader()
        reader.onload = e => preview.src = e.target.result
        reader.readAsDataURL(coverInput.files[0])
      }
    })
  }
})
