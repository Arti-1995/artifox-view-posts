export default class PostPopup {
    state = {
        title: '',
        description: '',
        image: '',
        date: '',
        permalink: ''
    }

    popupNode = undefined;

    constructor(options = {}) {
        if (!options.popupSelectorId) throw ("Popup Selector ID is not defined");

        this.popupNode = document.getElementById(options.popupSelectorId);
        this.popupNode.querySelector('.artifox-popup-post__button-close')
            .addEventListener('click', this.clickHandlerCloseButton.bind(this));
        console.log(this.popupNode);
    }

    clickHandlerCloseButton(event) {
        event.preventDefault();
        this.hide();
    }

    show() {
        this.popupNode.style.display = 'flex';
    }

    hide() {
        this.popupNode.style.display = 'none';
    }

    setState(state) {
        this.state = { ...this.state, ...state };

        this.render();
    }

    render() {
        this.popupNode.querySelector('.artifox-popup-post__title').innerHTML = this.state.title;
        this.popupNode.querySelector('.artifox-popup-post__description').innerHTML = this.state.description;
        this.popupNode.querySelector('.artifox-popup-post__image-wrapper').innerHTML = "";
        if (this.state.image) {
            const image = document.createElement('img');
            image.src = this.state.image;
            image.alt = this.state.title;
            this.popupNode.querySelector('.artifox-popup-post__image-wrapper').append(image);
        }
        this.popupNode.querySelector('.artifox-popup-post__link').href = this.state.permalink;
        this.popupNode.querySelector('.artifox-popup-post__link').title = this.state.title;
    }
}