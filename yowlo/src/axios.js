import axios from "axios";

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000";
axios.defaults.withXSRFToken = true;

axios.interceptors.request.use(
    config => {
        const token = localStorage.getItem('access_token');
        if (token) {
          config.headers['Authorization'] = `Bearer ${localStorage.getItem('access_token')}`;  
        }
      
          return config;
      },
      error => {
          return Promise.reject(error);
      }
  );