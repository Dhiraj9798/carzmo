/**
 * Carzmo static PHP site - navbar, hero, scroll sections, services track, gallery cart.
 */
;(function () {
  'use strict'

  const CART_KEY = 'carzmo_shop_cart'
  const ENQ_KEY = 'carzmo_cart_enquiry'
  const LOCK_REASON_NAV = 'mobile-nav'
  const LOCK_REASON_CART = 'mobile-cart'

  const lockReasons = new Set()

  function setBodyScrollLock(reason, shouldLock) {
    if (!reason) return
    if (shouldLock) {
      lockReasons.add(reason)
    } else {
      lockReasons.delete(reason)
    }
    document.body.classList.toggle('carzmo-lock-scroll', lockReasons.size > 0)
  }

  function prefersReducedMotion() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches
  }

  function scrollToSection(id) {
    if (id === 'home') {
      window.scrollTo({ top: 0, behavior: prefersReducedMotion() ? 'auto' : 'smooth' })
      return
    }

    const el = document.getElementById(id)
    if (!el) return

    const header = document.querySelector('.nav-glass-bar')
    const headerHeight = header ? Math.ceil(header.getBoundingClientRect().height) + 8 : 0
    const targetY = el.getBoundingClientRect().top + window.scrollY - headerHeight

    window.scrollTo({
      top: Math.max(0, targetY),
      behavior: prefersReducedMotion() ? 'auto' : 'smooth',
    })
  }

  document.addEventListener('click', function (event) {
    const trigger = event.target.closest('[data-scroll-to]')
    if (!trigger) return

    const id = trigger.getAttribute('data-scroll-to')
    if (!id) return

    event.preventDefault()
    scrollToSection(id)
  })

  function initInView() {
    const blurHost = document.querySelector('#home h1')
    if (blurHost && 'IntersectionObserver' in window) {
      const blurObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (!entry.isIntersecting) return
            blurHost.querySelectorAll('.blur-word').forEach((word) => word.classList.add('is-inview'))
            blurObserver.unobserve(blurHost)
          })
        },
        { threshold: 0.2, rootMargin: '0px 0px -10% 0px' },
      )
      blurObserver.observe(blurHost)
    } else if (blurHost) {
      blurHost.querySelectorAll('.blur-word').forEach((word) => word.classList.add('is-inview'))
    }

    const revealNodes = Array.from(document.querySelectorAll('.reveal-on-scroll'))
    if (!revealNodes.length) return

    revealNodes.forEach((node, index) => {
      if (!node.style.transitionDelay) {
        node.style.transitionDelay = String(Math.min((index % 6) * 60, 280)) + 'ms'
      }
    })

    if (!('IntersectionObserver' in window)) {
      revealNodes.forEach((node) => node.classList.add('is-inview'))
      return
    }

    const revealObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return
          entry.target.classList.add('is-inview')
          revealObserver.unobserve(entry.target)
        })
      },
      { threshold: 0.1, rootMargin: '0px 0px -8% 0px' },
    )

    revealNodes.forEach((node) => revealObserver.observe(node))
  }

  function initHero() {
    const heroSection = document.getElementById('home')
    const slides = Array.from(document.querySelectorAll('.hero-slide-img[data-hero-slide]'))
    if (!slides.length) return

    const dots = Array.from(document.querySelectorAll('[data-hero-dot]'))
    const prevBtn = document.querySelector('[data-hero-prev]')
    const nextBtn = document.querySelector('[data-hero-next]')

    let activeIndex = slides.findIndex((slide) => slide.classList.contains('is-active'))
    if (activeIndex < 0) activeIndex = 0

    let timer = 0

    function paintDot(dot, active) {
      dot.className =
        'h-2 rounded-full transition-all ' +
        (active ? 'w-8 bg-white' : 'w-2 bg-white/35 hover:bg-white/55')
      dot.setAttribute('aria-selected', active ? 'true' : 'false')
      dot.setAttribute('aria-current', active ? 'true' : 'false')
    }

    function setSlide(nextIndex) {
      const count = slides.length
      activeIndex = ((nextIndex % count) + count) % count

      slides.forEach((slide, index) => {
        const isActive = index === activeIndex
        slide.classList.toggle('is-active', isActive)
        slide.setAttribute('aria-hidden', isActive ? 'false' : 'true')
      })

      dots.forEach((dot, index) => paintDot(dot, index === activeIndex))
    }

    function stopAutoplay() {
      if (!timer) return
      window.clearInterval(timer)
      timer = 0
    }

    function startAutoplay() {
      stopAutoplay()
      if (slides.length < 2 || prefersReducedMotion()) return
      timer = window.setInterval(function () {
        setSlide(activeIndex + 1)
      }, 6200)
    }

    prevBtn?.addEventListener('click', function () {
      setSlide(activeIndex - 1)
      startAutoplay()
    })

    nextBtn?.addEventListener('click', function () {
      setSlide(activeIndex + 1)
      startAutoplay()
    })

    dots.forEach((dot) => {
      dot.addEventListener('click', function () {
        const raw = dot.getAttribute('data-hero-dot')
        const targetIndex = Number.parseInt(raw || '0', 10)
        if (!Number.isNaN(targetIndex)) {
          setSlide(targetIndex)
          startAutoplay()
        }
      })
    })

    heroSection?.addEventListener('mouseenter', stopAutoplay)
    heroSection?.addEventListener('mouseleave', startAutoplay)

    document.addEventListener('visibilitychange', function () {
      if (document.hidden) {
        stopAutoplay()
      } else {
        startAutoplay()
      }
    })

    setSlide(activeIndex)
    startAutoplay()
  }

  function initNav() {
    const header = document.querySelector('.nav-glass-bar')
    const menuBtn = document.getElementById('mobile-menu-btn')
    const panel = document.getElementById('mobile-nav-panel')
    const ddBtn = document.getElementById('services-dropdown-btn')
    const ddMenu = document.getElementById('services-dropdown-menu')
    const ddRoot = document.getElementById('services-dropdown-root')

    let outsideHandler = null
    let scrollRaf = 0

    function isMenuOpen() {
      return Boolean(panel?.classList.contains('is-open'))
    }

    function updateHeaderState() {
      if (!header) return
      const scrolled = window.scrollY > 20 || isMenuOpen()
      header.classList.toggle('is-scrolled', scrolled)
    }

    function closeDropdown() {
      if (outsideHandler) {
        document.removeEventListener('click', outsideHandler)
        outsideHandler = null
      }
      ddMenu?.classList.add('hidden')
      if (ddBtn) {
        ddBtn.setAttribute('aria-expanded', 'false')
        ddBtn.querySelector('.services-dd-chevron')?.classList.remove('is-open')
      }
    }

    function openDropdown() {
      if (!ddBtn || !ddMenu || !ddRoot) return

      ddMenu.classList.remove('hidden')
      ddBtn.setAttribute('aria-expanded', 'true')
      ddBtn.querySelector('.services-dd-chevron')?.classList.add('is-open')

      outsideHandler = function (event) {
        if (!ddRoot.contains(event.target)) {
          closeDropdown()
        }
      }

      window.setTimeout(function () {
        if (outsideHandler) {
          document.addEventListener('click', outsideHandler)
        }
      }, 0)
    }

    function setMenuState(open) {
      if (!panel || !menuBtn) return

      panel.classList.toggle('is-open', open)
      panel.setAttribute('aria-hidden', open ? 'false' : 'true')
      menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false')
      menuBtn.querySelector('.icon-menu')?.classList.toggle('hidden', open)
      menuBtn.querySelector('.icon-close')?.classList.toggle('hidden', !open)

      setBodyScrollLock(LOCK_REASON_NAV, open)
      if (open) {
        closeDropdown()
      }

      updateHeaderState()
    }

    function closeNavUi() {
      setMenuState(false)
      closeDropdown()
    }

    menuBtn?.addEventListener('click', function () {
      setMenuState(!isMenuOpen())
    })

    ddBtn?.addEventListener('click', function (event) {
      event.preventDefault()
      event.stopPropagation()

      const isHidden = ddMenu?.classList.contains('hidden')
      if (isHidden) {
        openDropdown()
      } else {
        closeDropdown()
      }
    })

    document.querySelectorAll('[data-nav-close]').forEach((el) => {
      el.addEventListener('click', closeNavUi)
    })

    window.addEventListener('keydown', function (event) {
      if (event.key !== 'Escape') return
      closeNavUi()
    })

    window.addEventListener('resize', function () {
      if (window.matchMedia('(min-width: 768px)').matches) {
        setMenuState(false)
      }
      updateHeaderState()
    })

    window.addEventListener(
      'scroll',
      function () {
        if (scrollRaf) return
        scrollRaf = window.requestAnimationFrame(function () {
          scrollRaf = 0
          updateHeaderState()
        })
      },
      { passive: true },
    )

    updateHeaderState()
  }



  function initGalleryCart() {
    const catalogEl = document.getElementById('carzmo-gallery-products')
    if (!catalogEl) return

    let catalog = {}
    try {
      const parsed = JSON.parse(catalogEl.textContent || '{}')
      if (parsed && typeof parsed === 'object') {
        catalog = parsed
      }
    } catch {
      catalog = {}
    }

    function ensureLiveRegion() {
      let region = document.getElementById('carzmo-cart-live')
      if (region) return region

      region = document.createElement('div')
      region.id = 'carzmo-cart-live'
      region.className = 'carzmo-screen-reader-only'
      region.setAttribute('aria-live', 'polite')
      region.setAttribute('aria-atomic', 'true')
      document.body.appendChild(region)
      return region
    }

    const liveRegion = ensureLiveRegion()

    function announce(message) {
      if (!liveRegion || !message) return
      liveRegion.textContent = ''
      window.setTimeout(function () {
        liveRegion.textContent = message
      }, 20)
    }

    function loadCart() {
      try {
        const raw = sessionStorage.getItem(CART_KEY)
        if (!raw) return {}
        const parsed = JSON.parse(raw)
        return parsed && typeof parsed === 'object' ? parsed : {}
      } catch {
        return {}
      }
    }

    let cart = loadCart()

    function saveCart() {
      sessionStorage.setItem(CART_KEY, JSON.stringify(cart))
    }

    function getLines() {
      return Object.entries(cart)
        .filter(([, qty]) => Number(qty) > 0)
        .map(([id, qty]) => {
          const product = catalog[id]
          if (!product) return null
          return { product, qty: Number(qty) }
        })
        .filter(Boolean)
    }

    function totalQty() {
      return Object.values(cart).reduce((sum, qty) => sum + (qty > 0 ? Number(qty) : 0), 0)
    }

    function escapeHtml(value) {
      const node = document.createElement('div')
      node.textContent = value
      return node.innerHTML
    }

    function buildWaUrl() {
      const lines = getLines()
      const brand = window.CARZMO?.name || 'Carzmo Motors'

      if (!lines.length) {
        return 'https://wa.me/918100364196'
      }

      const message = [
        'Hello ' + brand + ',',
        '',
        'I am interested in the following products:',
        ...lines.map(({ product, qty }) => '- ' + product.title + ' x ' + String(qty)),
        '',
        'Please share availability and pricing.',
        '',
        'Thank you.',
      ].join('\n')

      return 'https://wa.me/918100364196?text=' + encodeURIComponent(message)
    }

    function buildEnquiryPayload() {
      const lines = getLines()
      const brand = window.CARZMO?.name || 'Carzmo Motors'

      if (!lines.length) {
        return {
          message:
            'Hello ' +
            brand +
            ',\n\nI would like to enquire about your products and services.\n\nThank you.',
          items: [],
        }
      }

      return {
        message: [
          'Hello ' + brand + ',',
          '',
          'I would like to enquire about:',
          ...lines.map(({ product, qty }) => '- ' + product.title + ' x ' + String(qty)),
          '',
          'Please contact me with details.',
          '',
          'Thank you.',
        ].join('\n'),
        items: lines.map(({ product, qty }) => ({ id: product.id, title: product.title, qty })),
      }
    }

    function renderCartLines(listNode, emptyNode, badgeNode, clearWrapNode) {
      const lines = getLines()
      listNode.innerHTML = ''

      if (!lines.length) {
        emptyNode?.classList.remove('hidden')
        badgeNode?.classList.add('hidden')
        clearWrapNode?.classList.add('hidden')
        return
      }

      emptyNode?.classList.add('hidden')
      badgeNode?.classList.remove('hidden')
      clearWrapNode?.classList.remove('hidden')

      if (badgeNode) {
        badgeNode.textContent = String(totalQty())
      }

      lines.forEach(({ product, qty }) => {
        const line = document.createElement('li')
        line.className = 'flex gap-3 rounded-xl border border-white/10 bg-white/[0.04] p-2 pr-3'
        line.innerHTML =
          '<div class="relative flex h-14 w-14 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-white p-1">' +
          '<img src="' +
          product.image +
          '" alt="" class="max-h-full max-w-full object-contain object-center" width="56" height="56" />' +
          '</div>' +
          '<div class="min-w-0 flex-1">' +
          '<p class="font-body text-xs font-medium leading-snug text-white md:text-sm">' +
          escapeHtml(product.title) +
          '</p>' +
          '<p class="mt-0.5 font-body text-xs text-white/45">Qty ' +
          String(qty) +
          '</p>' +
          '</div>'

        listNode.appendChild(line)
      })
    }

    function syncCartUi() {
      const quantity = totalQty()

      const gallery = document.getElementById('gallery')
      if (gallery) {
        gallery.classList.toggle('gallery-section-has-cart', quantity > 0)
      }

      renderCartLines(
        document.getElementById('cart-lines-desktop'),
        document.getElementById('cart-empty-desktop'),
        document.getElementById('cart-badge-desktop'),
        document.getElementById('cart-clear-wrap-desktop'),
      )

      renderCartLines(
        document.getElementById('cart-lines-mobile'),
        document.getElementById('cart-empty-mobile'),
        document.getElementById('cart-badge-mobile'),
        document.getElementById('cart-clear-wrap-mobile'),
      )

      const hintForEmpty =
        'Add products for a detailed list, or use the buttons for a general message.'
      const hintForFilled =
        'WhatsApp opens with your list. Enquiry opens the contact form with the same list.'

      ;['cart-hint-desktop', 'cart-hint-mobile'].forEach((id) => {
        const hintNode = document.getElementById(id)
        if (hintNode) {
          hintNode.textContent = quantity === 0 ? hintForEmpty : hintForFilled
        }
      })

      const fab = document.getElementById('mobile-cart-fab')
      const fabText = document.getElementById('mobile-cart-fab-text')

      if (fab && fabText) {
        if (quantity > 0) {
          fab.classList.remove('hidden')
          fab.classList.add('flex')
          fabText.textContent =
            String(quantity) + ' item' + (quantity === 1 ? '' : 's') + ' in cart'
        } else {
          fab.classList.add('hidden')
          fab.classList.remove('flex')
        }
      }

      document.querySelectorAll('[data-cart-controls]').forEach((wrap) => {
        const id = wrap.getAttribute('data-cart-controls')
        const qty = Number(cart[id] || 0)

        const addBtn = wrap.querySelector('.cart-add-btn')
        const row = wrap.querySelector('.cart-qty-row')
        const label = wrap.querySelector('.cart-qty-label')
        const trashIcon = wrap.querySelector('.cart-trash-icon')
        const minusIcon = wrap.querySelector('.cart-minus-icon')

        if (qty <= 0) {
          addBtn?.classList.remove('hidden')
          row?.classList.add('hidden')
        } else {
          addBtn?.classList.add('hidden')
          row?.classList.remove('hidden')
          if (label) {
            label.textContent = String(qty)
          }

          if (qty === 1) {
            trashIcon?.classList.remove('hidden')
            minusIcon?.classList.add('hidden')
          } else {
            trashIcon?.classList.add('hidden')
            minusIcon?.classList.remove('hidden')
          }
        }
      })
    }

    function setQty(id, delta) {
      const product = catalog[id]
      if (!product) return

      const current = Number(cart[id] || 0)
      const next = Math.max(0, Math.min(99, current + delta))

      if (next <= 0) {
        const clone = { ...cart }
        delete clone[id]
        cart = clone
        announce(product.title + ' removed from cart')
      } else {
        cart = { ...cart, [id]: next }
        announce(product.title + ' quantity ' + String(next))
      }

      saveCart()
      syncCartUi()
    }

    document.getElementById('gallery')?.addEventListener('click', function (event) {
      const addBtn = event.target.closest('.cart-add-btn')
      if (addBtn) {
        const wrap = addBtn.closest('[data-cart-controls]')
        const id = wrap?.getAttribute('data-cart-controls')
        if (id) setQty(id, 1)
        return
      }

      const incBtn = event.target.closest('.cart-inc-btn')
      if (incBtn) {
        const wrap = incBtn.closest('[data-cart-controls]')
        const id = wrap?.getAttribute('data-cart-controls')
        if (id) setQty(id, 1)
        return
      }

      const decBtn = event.target.closest('.cart-dec-btn')
      if (decBtn) {
        const wrap = decBtn.closest('[data-cart-controls]')
        const id = wrap?.getAttribute('data-cart-controls')
        if (id) setQty(id, -1)
      }
    })

    function bindClearButton(id) {
      document.getElementById(id)?.addEventListener('click', function () {
        cart = {}
        saveCart()
        syncCartUi()
        announce('Cart cleared')
      })
    }

    bindClearButton('cart-clear-desktop')
    bindClearButton('cart-clear-mobile')

    function openWhatsapp() {
      window.open(buildWaUrl(), '_blank', 'noopener,noreferrer')
    }

    document.getElementById('cart-wa-desktop')?.addEventListener('click', openWhatsapp)
    document.getElementById('cart-wa-mobile')?.addEventListener('click', function () {
      openWhatsapp()
      closeMobileDrawer()
    })

    function goEnquiry() {
      sessionStorage.setItem(ENQ_KEY, JSON.stringify(buildEnquiryPayload()))
      closeMobileDrawer()
      const url = document.body.getAttribute('data-contact-url') || 'contact.php'
      window.location.href = url
    }

    document.getElementById('cart-enquiry-desktop')?.addEventListener('click', goEnquiry)
    document.getElementById('cart-enquiry-mobile')?.addEventListener('click', goEnquiry)

    const overlay = document.getElementById('mobile-cart-overlay')
    const drawer = document.getElementById('mobile-cart-drawer')

    function closeMobileDrawer() {
      overlay?.classList.add('hidden')
      overlay?.classList.remove('flex')
      drawer?.classList.remove('is-open')
      setBodyScrollLock(LOCK_REASON_CART, false)
    }

    function openMobileDrawer() {
      overlay?.classList.remove('hidden')
      overlay?.classList.add('flex')
      window.requestAnimationFrame(function () {
        drawer?.classList.add('is-open')
      })
      setBodyScrollLock(LOCK_REASON_CART, true)
    }

    document.getElementById('mobile-cart-fab')?.addEventListener('click', openMobileDrawer)
    document.getElementById('mobile-cart-scrim')?.addEventListener('click', closeMobileDrawer)
    document.getElementById('mobile-cart-close')?.addEventListener('click', closeMobileDrawer)

    window.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') {
        closeMobileDrawer()
      }
    })

    window.addEventListener('resize', function () {
      if (window.matchMedia('(min-width: 1024px)').matches) {
        closeMobileDrawer()
      }
    })

    syncCartUi()
  }

  function initContactForm() {
    const messageField = document.getElementById('enq-msg')
    if (!messageField) return

    try {
      const raw = sessionStorage.getItem(ENQ_KEY)
      if (raw) {
        const parsed = JSON.parse(raw)
        if (parsed && parsed.message) {
          messageField.value = parsed.message
        }
      }
    } catch {
      /* ignore */
    }

    sessionStorage.removeItem(ENQ_KEY)

    document.getElementById('enq-wa-btn')?.addEventListener('click', function () {
      const name = document.getElementById('enq-name')?.value?.trim() || '-'
      const phone = document.getElementById('enq-phone')?.value?.trim() || '-'
      const message =
        messageField.value?.trim() || 'I would like to enquire about your products and services.'
      const brand = window.CARZMO?.name || 'Carzmo Motors'

      const body = [
        'Hello ' + brand + ',',
        '',
        'Name: ' + name,
        'Phone: ' + phone,
        '',
        message,
      ].join('\n')

      window.open(
        'https://wa.me/918100364196?text=' + encodeURIComponent(body),
        '_blank',
        'noopener,noreferrer',
      )
    })
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.body.classList.add('js-ready')
    initInView()
    initHero()
    initNav()

    initGalleryCart()
    initContactForm()
  })
})()

