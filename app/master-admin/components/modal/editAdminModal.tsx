"use client";

import { motion, AnimatePresence } from "framer-motion";
import { useState } from "react";
import Image from "next/image";
import { Admin } from "@/public/admin";

interface EditAdminModalProps {
  isOpen: boolean;
  onClose: () => void;
  onSave: (admin: {
    name: string;
    role: string;
    phone: string;
    email: string;
    password: string;
    profile_photo?: File; 
    authentication_id: number; // Tetap sebagai number
    cafe_id?: number; // Tetap sebagai number (opsional)
  }) => void;
  admin: Admin;
}

export default function EditAdminModal({
  isOpen,
  onClose,
  onSave,
  admin,
}: EditAdminModalProps) {
  const [editAdmin, setEditAdmin] = useState({
    name: admin.name || "",
    role: admin.role || "",
    phone: admin.phone || "",
    email: admin.email || "",
    password: "", // Password bisa dikosongkan atau disesuaikan sesuai kebutuhan
    profile_photo: undefined as File | undefined,
    authentication_id: admin.authentication_id || "",
    cafe_id: admin.name ? admin.name : "", //
  });

  const [error, setError] = useState("");
  const [previewUrl, setPreviewUrl] = useState<string | null>(null);

  const handleChange = (
    e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>
  ) => {
    const { name, value } = e.target;
    setEditAdmin((prevState) => ({
      ...prevState,
      [name]: value,
    }));
  };

  const handleFileChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const file = e.target.files?.[0];
    if (file) {
      setEditAdmin((prevState) => ({
        ...prevState,
        profile_photo: file,
      }));
      setPreviewUrl(URL.createObjectURL(file));
    }
  };

  const handleSubmitEdit = async () => {
    try {
      const editedAdmin = {
        ...editAdmin,
      };
      // Save the admin
      onSave(editedAdmin);
      onClose();
    } catch (error) {
      console.error("Error: ", error);
      setError("Failed to save admin details.");
    }
  };

  return (
    <AnimatePresence>
      {isOpen && (
        <motion.div
          initial={{ opacity: 0, scale: 0.8 }}
          animate={{ opacity: 1, scale: 1 }}
          exit={{ opacity: 0, scale: 0.8 }}
          className="fixed inset-0 bg-black bg-opacity-30 flex justify-center items-center z-50"
        >
          <motion.div
            initial={{ y: -50 }}
            animate={{ y: 0 }}
            exit={{ y: -50 }}
            className="bg-white rounded-lg p-6 w-[32rem] shadow-lg"
          >
            <h2 className="text-lg font-bold mb-4">Add New Admin</h2>
            <form onSubmit={handleSubmitEdit}>
              {/* Informasi Umum */}
              <div className="grid grid-cols-2 gap-4 mb-4">
                <div className="mb-4">
                  <label className="block text-sm font-medium text-gray-700">
                    Name
                  </label>
                  <input
                    type="text"
                    name="name"
                    value={editAdmin.name}
                    onChange={handleChange}
                    className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    required
                  />
                </div>
                <div className="mb-4">
                  <label className="block text-sm font-medium text-gray-700">
                    Email
                  </label>
                  <input
                    type="email"
                    name="email"
                    value={editAdmin.email}
                    onChange={handleChange}
                    className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    required
                  />
                </div>
                <div className="mb-4">
                  <label className="block text-sm font-medium text-gray-700">
                    Phone
                  </label>
                  <input
                    type="text"
                    name="phone"
                    value={editAdmin.phone}
                    onChange={handleChange}
                    className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    required
                  />
                </div>
                <div className="mb-4">
                  <label className="block text-sm font-medium text-gray-700">
                    Role
                  </label>
                  <select
                    name="role"
                    value={editAdmin.role}
                    onChange={handleChange}
                    className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    required
                  >
                    <option value="">Select Role</option>
                    <option value="Master Admin">Master Admin</option>
                    <option value="Cafe Admin">Cafe Admin</option>
                  </select>
                </div>
              </div>
              <div className="mb-4">
                <label className="block text-sm font-medium text-gray-700">
                  Password
                </label>
                <input
                  type="password"
                  name="password"
                  value={editAdmin.password}
                  onChange={handleChange}
                  className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                  required
                />
              </div>

              {/* Informasi Tambahan */}
              <div className="grid grid-cols-2 gap-4 mb-4">
                <div className="mb-4">
                  <label className="block text-sm font-medium text-gray-700">
                    Profile Photo
                  </label>
                  <input
                    type="file"
                    accept="image/*"
                    onChange={handleFileChange}
                    className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                  />
                  {previewUrl && (
                    <Image
                      src={previewUrl}
                      alt="Profile Preview"
                      width={128}
                      height={128}
                      className="mt-2 object-cover rounded"
                    />
                  )}
                </div>
                <div className="mb-4">
                  <label className="block text-sm font-medium text-gray-700">
                    Authentication ID
                  </label>
                  <input
                    type="text"
                    name="authentication_id"
                    value={editAdmin.authentication_id}
                    onChange={handleChange}
                    className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                    required
                  />
                </div>
                <div className="mb-4 col-span-2">
                  <label className="block text-sm font-medium text-gray-700">
                    Cafe ID (optional)
                  </label>
                  <input
                    type="text"
                    name="cafe_id"
                    value={editAdmin.cafe_id}
                    onChange={handleChange}
                    className="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"
                  />
                </div>
              </div>

              {error && <p className="text-red-500 text-sm mb-4">{error}</p>}

              <div className="flex justify-end space-x-2">
                <button
                  type="button"
                  className="bg-gray-300 px-4 py-2 rounded-lg"
                  onClick={onClose}
                >
                  Cancel
                </button>
                <button
                  type="submit"
                  className="bg-[#DFB787] px-4 py-2 rounded-lg text-[#654B4B]"
                >
                  Save
                </button>
              </div>
            </form>
          </motion.div>
        </motion.div>
      )}
    </AnimatePresence>
  );
}
