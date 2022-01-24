import { ApiConnection1Repository } from './apiConnection1Repository';
import type { AxiosRequestConfig } from 'axios';
import type { AuthProps } from '../store/authContext';

export abstract class AuthApiConnection1Repository extends ApiConnection1Repository {
  constructor(auth: AuthProps) {
    super();
    this.client.interceptors.request.use((config: AxiosRequestConfig) => {
      if (!config.headers) config.headers = {};
      config.headers.Authorization = `Bearer ${auth.accessToken}`;
      return config;
    });
  }
}
