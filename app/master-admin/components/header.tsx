import Image from "next/image"
import mainImage from "@/public/assets/main-image"
import { BellIcon, MagnifyingGlassIcon } from "@heroicons/react/16/solid"

export default function Header(){
    return (
        <div className="bg-white shadow-md p-4 flex justify-between items-center rounded-xl">
        <div className="flex items-center">
            <Image alt="profile" src={mainImage.profile} width={50} height={50} className="w-10 h-10 rounded-full"/>
            <div className="ml-3">
                <p className="text-gray-800 font-semibold">
                    Alex John
                </p>
                <p className="text-gray-500 text-sm">
                    Master Admin
                </p>
            </div>
        </div>
        <div className="flex items-center bg-gray-200 rounded-xl px-4 py-2 w-[23.25rem]"> 
            <MagnifyingGlassIcon width={20} height={20} color="#6b7280"/>
            <input 
                className="bg-transparent focus:outline-none ml-4 text-sm" 
                placeholder="Search" 
                type="text" 
            />
        </div>
        <div className="relative">
            <div className="flex items-center justify-center bg-gray-200 rounded-full w-10 h-10">
                <BellIcon width={20} height={20}/>
            </div>
            <span className="absolute top-0 right-0 block h-2 w-2 bg-red-600 rounded-full">
            </span>
        </div>
    </div>
    )
}