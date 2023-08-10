/* global bootstrap: false */
(() => {
    'use strict'
    const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(tooltipTriggerEl => {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })

    const lessonSidebarAction = () => {
      let lessonSidebar = document.querySelector(".pp-lessons-sidebar")
      if (lessonSidebar) {
        if (window.innerWidth >= 768) {
          lessonSidebar.classList.add('show')
        }
      }
    }

    lessonSidebarAction()

    window.addEventListener("resize", lessonSidebarAction);

})()
  