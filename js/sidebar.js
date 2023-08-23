import { $ } from './dom.js'

const body = $('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector('.toggle'),
      modeSwitch = body.querySelector('.toggle-switch'),
      modeText = body.querySelector('.mode-text')

toggle.addEventListener('click' , () => {
    sidebar.classList.toggle('close')
})

modeSwitch.addEventListener('click' , () => {
    body.classList.toggle('dark')

    body.classList.contains('dark')
    ? modeText.innerHTML = 'Light mode'
    : modeText.innerHTML = 'Dark mode'
})
