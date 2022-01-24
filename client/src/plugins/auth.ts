import { authProps, AuthStateSymbol } from '../store/authContext';

export const auth = {
  install(app: any) {
    app.provide(AuthStateSymbol, authProps());
  },
};
