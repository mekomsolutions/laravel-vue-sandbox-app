import { AuthStateSymbol, useAuth } from '../store/useAuth';

export const auth = {
  install(app: any) {
    const auth = useAuth();
    app.provide(AuthStateSymbol, auth);
  },
};
