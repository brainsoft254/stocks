/*
 * This is the initial API interface
 * we set the base URL for the API
 */

import axios from "axios";

export const apiClient = axios.create({
    baseURL:
        process.env.NODE_ENV === "production"
            ? process.env.APP_URL
            : "http://stockcity.test",
    withCredentials: true, // required to handle the CSRF token
});
