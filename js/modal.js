import { $ } from './dom.js'

const openModalBtn = $('#openModalBtn')
const closeModalBtn = $('#closeModalBtn')
const modal = $('#modal')

openModalBtn.addEventListener('click', () => {
    modal.style.display = 'flex'
})

closeModalBtn.addEventListener('click', () => {
    modal.style.display = 'none'
})

window.addEventListener('click', e => {
    if (e.target === modal) {
        modal.style.display = 'none'
    }
})