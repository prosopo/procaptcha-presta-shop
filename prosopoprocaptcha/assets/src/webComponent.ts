import type {Logger} from "./logger.js";

export type WebComponentSettings = {
    name: string,
    setupCallback: (element: HTMLElement) => void,
}

export const defineWebComponent = (settings: WebComponentSettings, logger: Logger) => {
    class WebComponent extends HTMLElement {
        private isSetup: boolean;

        constructor() {
            super();

            this.isSetup = false;
        }

        public connectedCallback(): void {
            if (true === this.isSetup) {
                logger.debug("connectedCallback() is fired for the instance that was already setup, ignoring", {
                    element: this,
                })

                return;
            }

            this.isSetup = true;

            //  wait until window.loaded, as we need to make sure window.procaptcha is available.
            if ("complete" === document.readyState) {
                logger.debug("connectedCallback() is fired, processing", {
                    element: this,
                });

                settings.setupCallback(this);

                return;
            }

            logger.debug("connectedCallback() is fired, but document is not ready, delaying processing", {
                element: this,
            },);

            window.addEventListener(
                "load",
                settings.setupCallback.bind(settings, this),
            );
        }
    }

    customElements.define(settings.name, WebComponent);
}
