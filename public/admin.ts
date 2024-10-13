// types.ts
export interface Admin {
    admin_id: number;
    profile_photo: string | null;
    name: string;
    role: string;
    phone: string;
    email: string;
    authentication_id: number; // Harus ada
  }
  