function checkAll(source) {
    let checkboxes = document.getElementsByName('checked[]');
    for(let i=0;i<checkboxes.length;i++) {
        checkboxes[i].checked = source.checked;
    }
}