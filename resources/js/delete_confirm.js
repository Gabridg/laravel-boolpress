const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        const hasConfirmed = confirm('Sicuro di voler eliminare questo post?');
        if (hasConfirmed) form.submit();
    })
})