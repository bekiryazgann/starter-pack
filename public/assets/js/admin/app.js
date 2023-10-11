let body = document.body;


let search = document.querySelector('#search');
let commands = document.querySelector('#commands');
let close = commands.querySelectorAll('#close');
let searchInput = commands.querySelector('#search-input')
let status = false;
search.addEventListener('click', () => toggle())
close.forEach(element => element.addEventListener('click', () => toggle()))
document.addEventListener('keydown', e => {
    if (e.keyCode === 75) {
        if (e.metaKey || e.ctrlKey) {
            toggle()
        }
    }
    if (e.keyCode === 27) {
        if (status) {
            toggle();
        }
    }
})

let toggle = () => {
    if (status) {
        commands.classList.add('opacity-0')
        commands.classList.remove('opacity-1')
        setTimeout(() => {
            commands.classList.remove('block')
            commands.classList.add('hidden')
            searchInput.value = '';
        }, 300)
        body.classList.remove('overflow-hidden')
        status = false
    } else {
        //aç
        commands.classList.remove('hidden')
        commands.classList.add('block')
        setTimeout(() => {
            commands.classList.remove('opacity-0')
            commands.classList.add('opacity-1')
        }, 50)
        body.classList.add('overflow-hidden')
        status = true
        searchInput.focus();
    }
}


let alertClose = document.querySelector('#alert-close');
if (alertClose !== undefined){
    let alertElement = alertClose?.parentElement?.parentElement;
    alertClose?.addEventListener('click', e => {
        alertElement.classList.add('opacity-0')
        setTimeout(() => {
            alertElement.classList.add('hidden')
        }, 250);
    })
}

let menuCollapse = document.querySelectorAll('#collapse');
menuCollapse.forEach(container => {
    let trigger = container.querySelector('#trigger');
    let content = container.querySelector('#content');
    let state = (content.dataset.state !== 'false');
    let icon = trigger.querySelector('i.icon-chevron-down')
    let height = content.querySelector('div').offsetHeight
    trigger.addEventListener('click', e => {
        if (state){
            content.style.height = '0';
            content.dataset.state = 'false'
        } else {
            content.style.height = height + 'px';
            content.dataset.state = 'true'
        }
        icon.classList.toggle('-rotate-90');
        state = (content.dataset.state !== 'false');
    })
})