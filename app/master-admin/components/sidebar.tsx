"use client";

import React from "react";
import Link from "next/link";
import Image from "next/image";
import { usePathname } from "next/navigation";
import fonts from "@/public/assets/fonts";
import mainImage from "@/public/assets/main-image";
import { motion } from "framer-motion";
import {
  AdjustmentsHorizontalIcon,
  BuildingStorefrontIcon,
  Squares2X2Icon,
  UserGroupIcon,
  UsersIcon,
} from "@heroicons/react/16/solid";

export default function Sidebar() {
  const pathname = usePathname();

  // Fungsi untuk mengecek apakah link aktif
  const isActive = (path: string) => pathname === path;

  return (
    <motion.div
      className="w-72 h-full bg-white shadow-lg rounded-2xl flex flex-col p-4"
      initial={{ x: -200 }} // Sidebar starts off-screen
      animate={{ x: 0 }} // Animates into view
      transition={{ duration: 0.5, ease: "easeInOut" }} // Transition settings
    >
      <div className="p-2 pb-20">
        <div className="text-2xl font-bold text-gray-900">
          <Image width={100} height={0} alt="" src={mainImage.logo} />
        </div>
      </div>

      <div className="flex flex-col flex-grow justify-between">
        {/* Navigation Menu */}
        <nav className="space-y-2">
          {[
            {
              href: "/master-admin/contents/dashboard",
              icon: Squares2X2Icon,
              label: "Dashboard",
            },
            {
              href: "/master-admin/contents/cafe",
              icon: BuildingStorefrontIcon,
              label: "Cafes",
            },
            {
              href: "/master-admin/contents/admin",
              icon: UserGroupIcon,
              label: "Admins",
            },
            {
              href: "/master-admin/contents/user",
              icon: UsersIcon,
              label: "Users",
            },
          ].map(({ href, icon: Icon, label }) => (
            <Link key={href} href={href}>
              <motion.div
                className={`flex items-center py-2 px-4 text-[#654B4B] rounded-xl ${
                  isActive(href) ? "bg-[#F3D9B3]" : ""
                } mb-2`}
                whileHover={{ scale: 1.05 }}
                whileTap={{ scale: 0.95 }}
                transition={{ duration: 0.2 }}
              >
                <Icon width={20} height={20} />
                <span
                  className={`mx-4 sf-semibold text-sm ${fonts.satoshiMedium.className}`}
                >
                  {label}
                </span>
              </motion.div>
            </Link>
          ))}
        </nav>

        {/* Footer Menu */}
        <div className="space-y-2 mb-6">
          <Link href="/master-admin/settings">
            <motion.div
              className={`flex items-center py-2 px-4 text-[#654B4B]  rounded-xl ${
                isActive("/master-admin/settings") ? "bg-[#F3D9B3]" : ""
              }`}
              whileHover={{ scale: 1.05 }} // Animates on hover
              whileTap={{ scale: 0.95 }} // Animates on click
              transition={{ duration: 0.2 }}
            >
              <AdjustmentsHorizontalIcon width={20} height={20} />
              <span
                className={`mx-4 sf-semibold text-sm ${fonts.satoshiMedium.className}`}
              >
                Settings
              </span>
            </motion.div>
          </Link>
          <a
            href="#"
            className="flex items-center justify-center h-10 py-2 px-4 text-[#654B4B] bg-[#DFB787] rounded-xl"
          >
            <span
              className={`sf-semibold text-sm ${fonts.satoshiMedium.className}`}
            >
              Logout
            </span>
          </a>
        </div>
      </div>
    </motion.div>
  );
}
