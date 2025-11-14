import { buildRefs } from '@/assets/scripts/helpers'

export default function (el) {
  const refs = buildRefs(el, false, {
    iframe: 'iframe'
  })

  refs.playButton.addEventListener('click', loadVideo, { once: true })

  function loadVideo () {
    refs.iframe.addEventListener('load', videoIsLoaded, { once: true })
    refs.iframe.setAttribute('src', refs.iframe.getAttribute('data-src'))
    refs.videoPlayer.dataset.state = 'isLoading'
    refs.playButton.style.display = 'none'
  }

  function videoIsLoaded () {
    refs.videoPlayer.dataset.state = 'isLoaded'
    refs.posterImage.dataset.state = 'isHidden'
  }

  const IMConfig = window.GrandCookieIM.getConfig()
  const iframeSrc = refs.iframe.getAttribute('data-src')
  const service = Object.keys(IMConfig.services).find(serviceName => {
    return iframeSrc.includes(serviceName)
  })

  const state = window.GrandCookieIM.getState()
  const isServiceEnabled = state.acceptedServices.includes(service)

  if (!isServiceEnabled) {
    refs.videoPlayer.dataset.state = 'isBlocked'
    refs.acceptance.querySelector('.title').textContent = refs.iframe.title
    refs.acceptance.querySelector('.notice').innerHTML = IMConfig.services[service].languages[IMConfig.currLang].notice
    refs.acceptance.querySelector('.button').textContent = IMConfig.services[service].languages[IMConfig.currLang].loadAllBtn
  }

  window.addEventListener('cc:onConsent', ({ detail }) => {
    const state = window.GrandCookieIM.getState()
    const isServiceEnabled = state.acceptedServices.includes(service)

    if (isServiceEnabled) {
      refs.videoPlayer.dataset.state = ''
    }
  })

  refs.acceptance.querySelector('.button').addEventListener('click', () => {
    window.GrandCookieIM.acceptService(service)
    const servicesToAccept = [
      ...window.GrandCookie.getUserPreferences().acceptedServices.analytics,
      service
    ]
    window.GrandCookie.acceptService(servicesToAccept, 'analytics')
    refs.acceptance.style.display = 'none'
    loadVideo()
  })

  return () => {
    refs.playButton.removeEventListener('click', loadVideo)
    refs.iframe.removeEventListener('load', videoIsLoaded)
  }
}
