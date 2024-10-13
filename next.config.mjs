/** @type {import('next').NextConfig} */
const nextConfig = {
  images: {
      domains: ['cnmi.spmi.pt', '127.0.0.1'], // Tambahkan domain 127.0.0.1 di sini
      remotePatterns: [
          {
            protocol: 'https',
            hostname: 'images.pexels.com',
            port: '',
            pathname: '/photos/**',
          },
      ],
  },
};

export default nextConfig;

