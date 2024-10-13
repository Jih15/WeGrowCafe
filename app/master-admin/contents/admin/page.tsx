"use client";

import {
  EllipsisHorizontalIcon,
  FunnelIcon,
  PlusIcon,
} from "@heroicons/react/16/solid";
import Image from "next/image";
import { useEffect, useState } from "react";
import { motion } from "framer-motion";
import fonts from "@/public/assets/fonts";
import AddAdminModal from "../../components/modal/addAdminModal";
import ConfirmDeleteModal from "../../components/modal/confirmDeleteAdminModal";
import EditAdminModal from "../../components/modal/editAdminModal";

interface Admin {
  admin_id: number;
  profile_photo: string | null;
  name: string;
  role: string;
  cafe?: {
    name: string;
  };
  phone: string;
  email: string;
  authentication_id: number; // Pastikan ini ada

}


export default function AdminPage() {
  const [admins, setAdmins] = useState<Admin[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
  const [showModal, setShowModal] = useState(false);
  const [dropdownAdmin, setDropdownAdmin] = useState(false);
  const [checkedAdmin, setCheckedAdmin] = useState<number[]>([]);
  const [showConfirmModal, setShowConfirmModal] = useState(false);
  const [showEditModal, setShowEditModal] = useState(false);
  const [adminToEdit, setAdminToEdit] = useState<Admin | null>(null);

  const openEditModal = () => {
    if (checkedAdmin.length === 1) {
      const admin = admins.find((admin) => admin.admin_id === checkedAdmin[0]);
      if (admin) {
        setAdminToEdit(admin); // Set admin yang dicentang sebagai adminToEdit
        setShowEditModal(true); // Buka modal edit
      }
    } else {
      alert("Please select exactly one admin to edit."); // Jika lebih dari satu admin dicentang, munculkan pesan
    }
  };

  // Function to handle checkbox selection for admins
  const checkboxAdminHandler = (adminId: number) => {
    setCheckedAdmin((prevSelected) =>
      prevSelected.includes(adminId)
        ? prevSelected.filter((id) => id !== adminId)
        : [...prevSelected, adminId]
    );
  };

  // Function to delete selected admins
  const handleDeleteAdmin = async () => {
    try {
      const deletedAdmin = checkedAdmin.map(async (adminId) => {
        const response = await fetch(
          `http://localhost:8000/api/admins/${adminId}`,
          {
            method: "DELETE",
            headers: {
              "Content-type": "application/json",
            },
          }
        );

        if (!response.ok) {
          throw new Error(`Failed to delete admin with ID: ${adminId}`);
        }
      });

      await Promise.all(deletedAdmin);
      alert("Admins successfully deleted!");
      setCheckedAdmin([]); // Reset checkedAdmin after deletion
    } catch (error) {
      console.error("Error: ", error);
    } finally {
      setShowConfirmModal(false); // Close confirmation modal
    }
  };

  // Function to handle saving a new admin
  const handleSaveAdmin = (newAdmin: {
    name: string;
    role: string;
    phone: string;
    email: string;
    authentication_id: number; // Pastikan untuk menyertakan ini
  }) => {
    const newAdminData: Admin = {
      admin_id: admins.length + 1,
      profile_photo: "/default-avatar.png",
      ...newAdmin,
    };
    setAdmins((prev) => [...prev, newAdminData]); // Pastikan newAdminData adalah tipe Admin
  };
  

  // Fetch admin data from API on component mount
  useEffect(() => {
    async function fetchAdmin() {
      try {
        const response = await fetch("http://127.0.0.1:8000/api/admins");
        if (!response.ok) throw new Error("Network response was not ok");
        const data = await response.json();
        console.log(data);
        setAdmins(data);
      } catch (error) {
        setError("Error fetching admin data: " + error);
      } finally {
        setLoading(false);
      }
    }
    fetchAdmin();
  }, []);

  return (
    <div>
      <div className="flex justify-between mb-5 px-2">
        <div>
          <h1
            className={`text-[2rem] ${fonts.satoshiBold.className} tracking-tighter leading-tight text-[#654B4B]`}
          >
            Admin List
          </h1>
          <p
            className={`text-base ${fonts.satoshiLight.className} text-[#654B4B]`}
          >
            All admin list
          </p>
        </div>
        <div className="flex space-x-3">
          <div className="relative">
            <button
              onClick={() => setDropdownAdmin(!dropdownAdmin)}
              className="flex items-center justify-center w-10 h-10"
            >
              <span className="text-[#654B4B]">
                <EllipsisHorizontalIcon width={20} height={20} />
              </span>
            </button>
            {dropdownAdmin && (
              <motion.div
                initial={{ opacity: 0, scale: 0.9 }}
                animate={{ opacity: 1, scale: 1 }}
                exit={{ opacity: 0, scale: 0.9 }}
                transition={{ duration: 0.2 }}
                className="absolute right-0 mt-2 w-40 bg-white border border-gray-300 rounded-lg shadow-lg overflow-hidden"
              >
                <button
                  className="block w-full px-4 py-2 text-left text-sm text-[#654B4B] hover:bg-gray-100"
                  onClick={() => {
                    setDropdownAdmin(false);
                    const admin = admins.find(
                      (admin) => admin.admin_id === checkedAdmin[0]
                    );
                    if (admin) {
                      setAdminToEdit(admin);
                      setShowEditModal(true);
                    }
                  }}
                >
                  Edit
                </button>
                <button
                  className="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-gray-100"
                  onClick={() => {
                    setDropdownAdmin(false);
                    setShowConfirmModal(true);
                  }}
                >
                  Delete
                </button>
              </motion.div>
            )}
          </div>
          <button className="flex items-center justify-center w-24 h-10 border-2 border-[#654B4B] rounded-lg">
            <FunnelIcon width={18} height={18} color="#654B4B" />
            <span
              className={`ml-2 ${fonts.satoshiMedium.className} text-[#654B4B] text-sm`}
            >
              Filter
            </span>
          </button>
          <motion.button
            whileTap={{ scale: 1.05 }}
            className="flex items-center justify-center w-28 h-10 bg-[#DFB787] rounded-lg"
            onClick={() => setShowModal(true)}
          >
            <span
              className={`mr-1 ${fonts.satoshiMedium.className} text-[#654B4B] text-sm`}
            >
              Add New
            </span>
            <PlusIcon width={18} height={18} color="#654B4B" />
          </motion.button>
        </div>
      </div>

      <div className="p-0 shadow-md rounded-2xl">
        <table className="table-auto w-full text-left border-collapse rounded-2xl">
          <thead className="bg-gray-200 h-14">
            <tr>
              <th
                className={`px-4 py-2 ${fonts.satoshiMedium.className} text-sm text-[#654B4B]`}
              ></th>
              <th
                className={`px-4 py-2 ${fonts.satoshiMedium.className} text-sm text-[#654B4B]`}
              >
                ID
              </th>
              <th
                className={`px-4 py-2 ${fonts.satoshiMedium.className} text-sm text-[#654B4B]`}
              >
                Name
              </th>
              <th
                className={`px-4 py-2 ${fonts.satoshiMedium.className} text-sm text-[#654B4B]`}
              >
                Cafe
              </th>
              <th
                className={`px-4 py-2 ${fonts.satoshiMedium.className} text-sm text-[#654B4B]`}
              >
                Phone
              </th>
              <th
                className={`px-4 py-2 ${fonts.satoshiMedium.className} text-sm text-[#654B4B]`}
              >
                Email
              </th>
              <th
                className={`px-4 py-2 ${fonts.satoshiMedium.className} text-sm text-[#654B4B]`}
              >
                Login Auth
              </th>
            </tr>
          </thead>
          <tbody className="bg-white">
            {loading ? (
              <tr>
                {Array.from({ length: 7 }).map((_, index) => (
                  <td key={index} className="border-b-2 px-4 py-4">
                    <div className="animate-pulse h-4 bg-gray-300 rounded w-full"></div>
                  </td>
                ))}
              </tr>
            ) : error ? (
              <tr>
                <td
                  colSpan={6}
                  className="border-b-2 px-4 py-4 text-center text-red-600"
                >
                  {error}
                </td>
              </tr>
            ) : admins.length === 0 ? (
              <tr>
                <td colSpan={6} className="border-b-2 px-4 py-4 text-center">
                  No admins found
                </td>
              </tr>
            ) : (
              admins.map((admin) => (
                <tr key={admin.admin_id} className="hover:bg-gray-100">
                  <td className="border-b-2 px-4 py-4">
                    <input
                      type="checkbox"
                      checked={checkedAdmin.includes(admin.admin_id)}
                      onChange={() => checkboxAdminHandler(admin.admin_id)}
                    />
                  </td>
                  <td className="border-b-2 px-4 py-4">{admin.admin_id}</td>
                  <td className="border-b-2 px-4 py-4 flex items-center">
                    <Image
                      src={admin.profile_photo 
                        ? `http://127.0.0.1:8000/storage/${admin.profile_photo}`
                        : "/assets/image/main/profile.jpg"}
                      alt="Admin Profile"
                      width={40}
                      height={40}
                      className="w-10 h-10 rounded-full"
                    />
                    <span className="ml-2">{admin.name}</span>
                  </td>
                  <td className="border-b-2 px-4 py-4">
                    {admin.cafe?.name || "N/A"}
                  </td>
                  <td className="border-b-2 px-4 py-4">{admin.phone}</td>
                  <td className="border-b-2 px-4 py-4">{admin.email}</td>
                  <td className="border-b-2 px-4 py-4">
                    {admin.authentication_id|| "N/A"}
                  </td>
                </tr>
              ))
            )}
          </tbody>
        </table>
      </div>

      {/* Add Admin Modal */}
      {showModal && (
        <AddAdminModal
          isOpen={showModal}
          onClose={() => setShowModal(false)}
          onSave={handleSaveAdmin}
        />
      )}

      {/* Confirm Delete Modal */}
      {showConfirmModal && (
        <ConfirmDeleteModal
          isOpen={showConfirmModal}
          onClose={() => setShowConfirmModal(false)}
          onConfirm={handleDeleteAdmin}
        />
      )}

      {/* Edit Admin Modal */}
      {showEditModal && adminToEdit && (
        <EditAdminModal
          isOpen={showEditModal}
          admin={adminToEdit} // Kirim adminToEdit ke modal
          onClose={() => {
            setShowEditModal(false);
            setAdminToEdit(null); // Reset adminToEdit saat modal ditutup
          }}
          onSave={handleSaveAdmin}
        />
      )}
    </div>
  );
}
