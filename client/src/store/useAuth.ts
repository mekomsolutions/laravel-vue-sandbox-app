import { inject, InjectionKey, readonly, ref } from 'vue';

export const useAuth = () => {
  const accessToken = ref('');
  const refreshToken = ref('');

  const hasToken = () => accessToken.value !== '';

  const setToken = (newAccessToken: string, newRefreshToken: string) => {
    accessToken.value = newAccessToken;
    refreshToken.value = newRefreshToken;
  };

  return readonly({
    accessToken: accessToken,
    refreshToken: refreshToken,
    hasToken,
    setToken,
  });
};

type AuthStateType = ReturnType<typeof useAuth>;
export const AuthStateSymbol: InjectionKey<AuthStateType> = Symbol('AuthState');
export const injectAuth = (): AuthStateType => {
  const auth = inject(AuthStateSymbol);
  if (auth === undefined) {
    throw new Error('auth は provide されていません。');
  }

  return auth;
};
