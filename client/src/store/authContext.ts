import { inject, InjectionKey, readonly, ref } from 'vue';

export const authProps = () => {
  const accessToken = ref('');
  const refreshToken = ref('');

  const hasToken = () => accessToken.value !== '';

  const setTokens = (newAccessToken = '', newRefreshToken = '') => {
    accessToken.value = newAccessToken;
    refreshToken.value = newRefreshToken;
  };

  return readonly({
    accessToken,
    refreshToken,
    hasToken,
    setTokens,
  });
};
export type AuthProps = ReturnType<typeof authProps>;

export const AuthStateSymbol: InjectionKey<AuthProps> = Symbol('AuthState');

export const injectAuth = (): AuthProps => {
  const auth = inject(AuthStateSymbol);
  if (auth === undefined) {
    throw new Error('auth is not provided');
  }

  return auth;
};
