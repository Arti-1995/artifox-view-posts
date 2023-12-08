import PostPopup from "./components/PostPopup";

window.artifox = {};
document.addEventListener("DOMContentLoaded", function(event) {

    window.artifox.popupViewPost = new PostPopup({
        popupSelectorId: "artifoxPopupViewPosts"
    });

    const postItems = document.querySelectorAll('.artifox-view-post__item');
    postItems.forEach(item => {
        item.addEventListener('click', function (event) {
            // const postItemNode = event.target.parentNode;
            const data = {
                title: item.getAttribute('data-title'),
                image: item.getAttribute('data-image'),
                date: item.getAttribute('data-date'),
                permalink: item.getAttribute('data-permalink'),
                description: item.getAttribute('data-description'),
            };

            window.artifox.popupViewPost.setState(data);
            window.artifox.popupViewPost.show();
        });
    });
});