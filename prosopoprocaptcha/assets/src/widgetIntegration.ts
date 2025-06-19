import {createLogger} from "./logger.js";
import {defineWebComponent} from "./webComponent.js";
import {createWidget} from "./widget.js";

const logger = createLogger();

defineWebComponent({
    name: "prosopo-procaptcha-presta-widget",
    setupCallback: (element: HTMLElement) => createWidget({
        container: element,
        attributes: {},// fixme theme and others.
    }, logger),
}, logger);
