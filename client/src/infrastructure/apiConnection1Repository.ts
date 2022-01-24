import axios from 'axios';
import type { AxiosInstance } from 'axios';

export abstract class ApiConnection1Repository {
  protected client: AxiosInstance;
  constructor() {
    this.client = axios.create({
      baseURL: 'http://localhost/server/api',
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
      },
      timeout: 2000,
    });
  }
}
