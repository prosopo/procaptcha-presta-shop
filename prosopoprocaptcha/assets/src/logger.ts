type LogLevel = 'debug' | 'warning';

export type Logger = {
    [level in LogLevel]: (message: string, data?: object) => void;
}

export const createLogger = (): Logger => {
    return {
        debug: (message: string, data?: object) => log("debug", message, data),
        warning: (message: string, data?: object) => log("warning", message, data),
    }
}

const log = (level: string, message: string, data?: object) => {
    console.log(`Procaptcha Presta [${level}]: ${message}`);

    if (data && Object.keys(data).length > 0) {
        console.log(data);
    }
}