import localFont from "next/font/local";

export const geistSans = localFont({
  src: "./fonts/GeistVF.woff",
  variable: "--font-geist-sans",
  weight: "100 900",
});
export const geistMono = localFont({
  src: "./fonts/GeistMonoVF.woff",
  variable: "--font-geist-mono",
  weight: "100 900",
});

export const satoshiBold = localFont({
  src: "./fonts/Satoshi-Bold.woff",
  variable: "--font-satoshi-bold",
  weight: "700",
});

export const satoshiMedium = localFont({
  src: "./fonts/Satoshi-Medium.woff",
  variable: "--font-satoshi-medium",
  weight: "500",
});

export const satoshiLight = localFont({
  src: "./fonts/Satoshi-Light.woff",
  variable: "--font-satoshi-light",
  weight: "200",
});

const fonts = {
  geistSans,
  geistMono,
  satoshiBold,
  satoshiMedium,
  satoshiLight,
};

export default fonts;
