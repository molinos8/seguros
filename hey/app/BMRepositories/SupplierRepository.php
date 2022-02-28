<?php
namespace App\BMRepositories;

use App\BMRepositories\Interfaces\IRepository;
use App\Models\Supplier;
use App\Models\SupplierContact;

class SupplierRepository implements IRepository {

    /**
     * Return the main id of the Suppliers model
     *
     * @return int
     */
    public function getId():int
    {
        return $this->entityId;
    }

    /**
     * Function to persist one supplier
     *
     * @param array $data
     *
     * @return Supplier $supplierId
     */
    public function persistOneSupplier(array $data):Supplier
    {
        $supplierData = [
            'name' => $data['name'],
            'slug' => $data['slug']
        ];
        $supplierDB = new Supplier();
        $supplierId = $supplierDB::create($supplierData);
        return $supplierId;
    }

    /**
     * Function to persist one supplier Contact
     *
     * @param array $data
     *
     * @return SupplierContact $supplierContactId
     */
    public function persistOneSupplierContact(array $data):SupplierContact
    {
        $supplierContactData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'position' => $data['position'],
            'supplier_id' => $data['supplier_id']
        ];
        $supplierContactDB = new SupplierContact();
        $supplierContactId = $supplierContactDB::create($supplierContactData);
        return $supplierContactId;
    }

    /**
     * Function to delete one supplier Contact
     *
     * @param array $data
     */
    public function deleteSupplierContact(array $data)
    {
        $supplierContact = new SupplierContact();
        $supplierContact->find($data['id']);
        $supplierContact->delete();
    }
}