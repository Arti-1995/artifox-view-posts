export default class Component {
    options = {};
    dom = {};
    state = {};
    components = {};

    constructor(options = {}, defaultState = {}) {
        this.setOptions(options);
        this.setState(defaultState, false);
        this.initDom();
        this.initChildComponents();
        this.init();
        this.initEvents();
        this.triggerChangeState();
    }

    setOptions(options) {
        this.validateOptions(options);
        this.options = options;
    }

    addEventListener(element, event, callback) {
        element.addEventListener(event, callback.bind(this), false);
    }

    getElementByID(elementID) {
        const element = document.getElementById(elementID);

        if (!element) throw new Error(`Element with ID '${elementID}' not found`);

        return element;
    }

    setState(state = {}, update = true) {
        const currentState = this.state;
        this.state = { ...currentState, ...state };

        if (update) this.triggerChangeState();
    }

    validateOptions(options) { return; }

    initDom() { return; }

    initChildComponents() { return; }

    initEvents() { return; }

    init() { /*throw new Error("Needs to be implemented in child class");*/ }

    triggerChangeState() { return; }
}