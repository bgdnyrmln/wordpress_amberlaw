export default function (el) {
  const isDesktopMediaQuery = window.matchMedia('(min-width: 1024px)')
  isDesktopMediaQuery.addEventListener('change', onBreakpointChange)

  onBreakpointChange()

  function onBreakpointChange () {
    if (isDesktopMediaQuery.matches) {
      setScrollPaddingTop()
    }
  }

  function setScrollPaddingTop () {
    const scrollPaddingTop = document.getElementById('wpadminbar')
      ? document.getElementById('wpadminbar').offsetHeight
      : 0
    document.documentElement.style.scrollPaddingTop = `${scrollPaddingTop}px`
  }

  const header = document.querySelector('html') // Replace '.header' with the selector for your header element
  const scrollThreshold = 0 // The scroll threshold in pixels

  window.addEventListener('scroll', () => {
    if (window.scrollY > scrollThreshold) {
      header.classList.add('scrolled') // Replace 'scrolled' with the class you want to add when scrolled
    } else {
      header.classList.remove('scrolled')
    }
  })
}
