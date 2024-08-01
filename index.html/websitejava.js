document.querySelectorAll('.left-column li').forEach(item => {
    item.addEventListener('mouseenter', () => {
        const content = item.querySelector('.hover-content');
        content.style.maxHeight = content.scrollHeight + 'px';
        content.style.opacity = 1;
    });

    item.addEventListener('mouseleave', () => {
        const content = item.querySelector('.hover-content');
        content.style.maxHeight = '0';
        content.style.opacity = 0;
    });
});
