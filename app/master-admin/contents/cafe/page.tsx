export default function CafePage() {
  return (
    <div className="p-0">
      <div className="flex justify-between mb-5 px-2">
        <div>
          <h1 className="text-[2rem] tracking-tighter leading-tight sf-bold text-[#654B4B]">
            Cafe List
          </h1>
          <p className="text-sm sf-regular text-[#654B4B]">All cafe list</p>
        </div>
        <div className="flex space-x-3">
          <button className="flex items-center justify-center w-24 h-10 border-2 border-[#654B4B] rounded-lg">
            <span className="ml-2 sf-medium text-[#654B4B] text-sm">
              Filter
            </span>
          </button>
          <button className="flex items-center justify-center w-32 h-10 bg-[#DFB787] rounded-lg">
            <span className="mr-1 sf-medium text-[#654B4B] text-sm">
              Add New
            </span>
          </button>
        </div>
      </div>

      <div className="p-0 shadow-md rounded-2xl">
        <table className="table-auto w-full text-left border-collapse overflow-hidden rounded-2xl">
          <thead className="bg-gray-200 h-14">
            <tr>
              <th className="px-4 py-2 font-medium text-sm text-[#654B4B] border-l-0 border-r-0">
                ID
              </th>
              <th className="px-4 py-2 font-medium text-sm text-[#654B4B] border-l-0 border-r-0">
                Profile Photo
              </th>
              <th className="px-4 py-2 font-medium text-sm text-[#654B4B] border-l-0 border-r-0">
                Cafes Name
              </th>
              <th className="px-4 py-2 font-medium text-sm text-[#654B4B] border-l-0 border-r-0">
                Contact
              </th>
              <th className="px-4 py-2 font-medium text-sm text-[#654B4B] border-l-0 border-r-0">
                Location
              </th>
              <th className="px-4 py-2 font-medium text-sm text-[#654B4B] border-l-0 border-r-0">
                Description
              </th>
            </tr>
          </thead>
          <tbody className="bg-white">
            <tr>
              <td className="border-l-0 border-r-0 border-b-2 px-4 py-2 font-light text-sm">
                1
              </td>
              <td className="border-l-0 border-r-0 border-b-2 px-4 py-2 font-light text-sm">
                <img
                  src="https://via.placeholder.com/50"
                  alt="Cafe Logo"
                  className="rounded-full"
                />
              </td>
              <td className="border-l-0 border-r-0 border-b-2 px-4 py-2 font-light text-sm">
                Lamak Coffee & Shakes
              </td>
              <td className="border-l-0 border-r-0 border-b-2 px-4 py-2 font-light text-sm">
                +628465423456
              </td>
              <td className="border-l-0 border-r-0 border-b-2 px-4 py-2 font-light text-sm">
                Jl. Soekarno Hatta, Padang
              </td>
              <td className="border-l-0 border-r-0 border-b-2 px-4 py-2 font-light text-sm">
                Lorem ipsum dolor sit amet...
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  );
}
