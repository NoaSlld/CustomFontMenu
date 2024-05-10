let nextId = 1;
function generateMenuItemId(parentId) {
    let newId = parentId + "-" + nextId
    ++nextId
    return newId
}

// <!-- This function may become obsolete if we use a form field instead of a modifier button -->
function changeName(element, newContent) {
    let menuItem = document.getElementById(element)
    if (menuItem === null) {
        console.error("The parent or child id given in changeName parameter doesn't exist")
        return
    }
    let titleSpan = menuItem.querySelector('[data-id="titleSpan"]')
    titleSpan.textContent = newContent
}

function addCustomMenuItem(id="0"){
    const newUl = document.createElement('ul')
    newUl.innerHTML = `{include file="../menu-parent.html"}`
    newUl.id = generateMenuItemId(id)
    document.getElementById('custom-menu-list').appendChild(newUl)
}