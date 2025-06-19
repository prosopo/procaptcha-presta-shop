import type {Logger} from "./logger.js";

declare global {
    interface Window {
        procaptcha: {
            render: (element: HTMLElement, attributes: object) => () => void;
        };
        procaptchaWpAttributes: object;
    }
}

export type WidgetSettings = {
    container: HTMLElement,
    attributes: object,
}

export const createWidget = (settings: WidgetSettings, logger: Logger) => {
    const procaptchaServiceCallback = getProcaptchaServiceCallback();

    if (null === procaptchaServiceCallback) {
        logger.warning("Procaptcha service script is not available.", settings);

        return;
    }

    const captchaElement = settings.container.querySelector(".prosopo-procaptcha");

    if (captchaElement instanceof HTMLElement) {
        logger.debug("Rendering widget", settings);

        procaptchaServiceCallback(captchaElement, settings.attributes);
    } else {
        logger.warning("Inner captcha container is missing.", settings);
    }
};

const getProcaptchaServiceCallback = ():
    | ((element: HTMLElement, args: object) => () => void)
    | null => {
    if (
        window.hasOwnProperty("procaptcha") &&
        "object" === typeof window["procaptcha"] &&
        "function" === typeof window["procaptcha"].render
    ) {
        return window["procaptcha"].render;
    }

    return null;
}
