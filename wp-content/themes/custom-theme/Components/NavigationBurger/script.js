import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
import delegate from 'delegate-event-listener'
import { buildRefs } from '@/assets/scripts/helpers.js'

export default function (el) {
  let isMenuOpen
  const refs = buildRefs(el)
  const navigationHeight = parseInt(window.getComputedStyle(el).getPropertyValue('--navigation-height')) || 0

  const isDesktopMediaQuery = window.matchMedia('(min-width: 1024px)')
  isDesktopMediaQuery.addEventListener('change', onBreakpointChange)

  const menuButtonClickDelegate = delegate('[data-ref="menuButton"]', onMenuButtonClick)
  el.addEventListener('click', menuButtonClickDelegate)

  onBreakpointChange()

  function onMenuButtonClick (e) {
    isMenuOpen = !isMenuOpen
    refs.menuButton.setAttribute('aria-expanded', isMenuOpen)

    if (isMenuOpen) {
      el.setAttribute('data-status', 'menuIsOpen')
      disableBodyScroll(refs.menu)
    } else {
      el.removeAttribute('data-status')
      enableBodyScroll(refs.menu)
    }
  }

  function onBreakpointChange () {
    if (!isDesktopMediaQuery.matches) {
      setScrollPaddingTop()
    }
  }

  function setScrollPaddingTop () {
    const scrollPaddingTop = document.getElementById('wpadminbar')
      ? navigationHeight + document.getElementById('wpadminbar').offsetHeight
      : navigationHeight
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

  return () => {
    isDesktopMediaQuery.removeEventListener('change', onBreakpointChange)
    el.removeEventListener('click', menuButtonClickDelegate)
  }
}
