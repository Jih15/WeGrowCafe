import { motion } from "framer-motion";

interface ConfirmDeleteAdminProps {
  isOpen: boolean;
  onClose: () => void;
  onConfirm: () => void;
}

const ConfirmDeleteModal: React.FC<ConfirmDeleteAdminProps> = ({
  isOpen,
  onClose,
  onConfirm,
}) => {
  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
      <motion.div
        initial={{ opacity: 0, scale: 0.9 }}
        animate={{ opacity: 1, scale: 1 }}
        exit={{ opacity: 0, scale: 0.9 }}
        className="bg-white rounded-lg p-5 shadow-lg"
      >
        <h2 className="text-lg font-bold mb-4">Konfirmasi Penghapusan</h2>
        <p className="text-sm">Apakah Anda yakin ingin menghapus admin yang dipilih?</p>
        <div className="flex justify-end mt-8 space-x-4">
          <button className="mr-2" onClick={onClose}>
            Batal
          </button>
          <button
            className="bg-red-600 text-white px-4 py-2 rounded"
            onClick={() => {
              onConfirm();
              onClose();
            }}
          >
            Hapus
          </button>
        </div>
      </motion.div>
    </div>
  );
};

export default ConfirmDeleteModal;