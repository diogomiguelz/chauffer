<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property string $brand
 * @property string $model
 * @property int|null $year
 * @property string|null $plate_number
 * @property string|null $color
 * @property int|null $seats
 * @property string|null $transmission
 * @property string|null $fuel_type
 * @property float|null $price_per_day
 * @property int|null $mileage
 * @property string|null $status
 * @property string|null $photos
 * @property string|null $features
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Car extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const TRANSMISSION_AUTOMATIC = 'automatic';
    const TRANSMISSION_MANUAL = 'manual';
    const FUEL_TYPE_GASOLINE = 'gasoline';
    const FUEL_TYPE_DIESEL = 'diesel';
    const FUEL_TYPE_ELECTRIC = 'electric';
    const FUEL_TYPE_HYBRID = 'hybrid';
    const STATUS_AVAILABLE = 'available';
    const STATUS_MAINTENANCE = 'maintenance';
    const STATUS_RENTED = 'rented';
    const STATUS_INACTIVE = 'inactive';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'plate_number', 'color', 'seats', 'transmission', 'fuel_type', 'price_per_day', 'mileage', 'status', 'photos', 'features'], 'default', 'value' => null],
            [['brand', 'model'], 'required'],
            [['year', 'seats', 'mileage'], 'integer'],
            [['transmission', 'fuel_type', 'status'], 'string'],
            [['price_per_day'], 'number'],
            [['photos', 'features', 'created_at', 'updated_at'], 'safe'],
            [['brand', 'model'], 'string', 'max' => 50],
            [['plate_number'], 'string', 'max' => 20],
            [['color'], 'string', 'max' => 30],
            ['transmission', 'in', 'range' => array_keys(self::optsTransmission())],
            ['fuel_type', 'in', 'range' => array_keys(self::optsFuelType())],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            [['plate_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
            'model' => 'Model',
            'year' => 'Year',
            'plate_number' => 'Plate Number',
            'color' => 'Color',
            'seats' => 'Seats',
            'transmission' => 'Transmission',
            'fuel_type' => 'Fuel Type',
            'price_per_day' => 'Price Per Day',
            'mileage' => 'Mileage',
            'status' => 'Status',
            'photos' => 'Photos',
            'features' => 'Features',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    /**
     * column transmission ENUM value labels
     * @return string[]
     */
    public static function optsTransmission()
    {
        return [
            self::TRANSMISSION_AUTOMATIC => 'automatic',
            self::TRANSMISSION_MANUAL => 'manual',
        ];
    }

    /**
     * column fuel_type ENUM value labels
     * @return string[]
     */
    public static function optsFuelType()
    {
        return [
            self::FUEL_TYPE_GASOLINE => 'gasoline',
            self::FUEL_TYPE_DIESEL => 'diesel',
            self::FUEL_TYPE_ELECTRIC => 'electric',
            self::FUEL_TYPE_HYBRID => 'hybrid',
        ];
    }

    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_AVAILABLE => 'available',
            self::STATUS_MAINTENANCE => 'maintenance',
            self::STATUS_RENTED => 'rented',
            self::STATUS_INACTIVE => 'inactive',
        ];
    }

    /**
     * @return string
     */
    public function displayTransmission()
    {
        return self::optsTransmission()[$this->transmission];
    }

    /**
     * @return bool
     */
    public function isTransmissionAutomatic()
    {
        return $this->transmission === self::TRANSMISSION_AUTOMATIC;
    }

    public function setTransmissionToAutomatic()
    {
        $this->transmission = self::TRANSMISSION_AUTOMATIC;
    }

    /**
     * @return bool
     */
    public function isTransmissionManual()
    {
        return $this->transmission === self::TRANSMISSION_MANUAL;
    }

    public function setTransmissionToManual()
    {
        $this->transmission = self::TRANSMISSION_MANUAL;
    }

    /**
     * @return string
     */
    public function displayFuelType()
    {
        return self::optsFuelType()[$this->fuel_type];
    }

    /**
     * @return bool
     */
    public function isFuelTypeGasoline()
    {
        return $this->fuel_type === self::FUEL_TYPE_GASOLINE;
    }

    public function setFuelTypeToGasoline()
    {
        $this->fuel_type = self::FUEL_TYPE_GASOLINE;
    }

    /**
     * @return bool
     */
    public function isFuelTypeDiesel()
    {
        return $this->fuel_type === self::FUEL_TYPE_DIESEL;
    }

    public function setFuelTypeToDiesel()
    {
        $this->fuel_type = self::FUEL_TYPE_DIESEL;
    }

    /**
     * @return bool
     */
    public function isFuelTypeElectric()
    {
        return $this->fuel_type === self::FUEL_TYPE_ELECTRIC;
    }

    public function setFuelTypeToElectric()
    {
        $this->fuel_type = self::FUEL_TYPE_ELECTRIC;
    }

    /**
     * @return bool
     */
    public function isFuelTypeHybrid()
    {
        return $this->fuel_type === self::FUEL_TYPE_HYBRID;
    }

    public function setFuelTypeToHybrid()
    {
        $this->fuel_type = self::FUEL_TYPE_HYBRID;
    }

    /**
     * @return string
     */
    public function displayStatus()
    {
        return self::optsStatus()[$this->status];
    }

    /**
     * @return bool
     */
    public function isStatusAvailable()
    {
        return $this->status === self::STATUS_AVAILABLE;
    }

    public function setStatusToAvailable()
    {
        $this->status = self::STATUS_AVAILABLE;
    }

    /**
     * @return bool
     */
    public function isStatusMaintenance()
    {
        return $this->status === self::STATUS_MAINTENANCE;
    }

    public function setStatusToMaintenance()
    {
        $this->status = self::STATUS_MAINTENANCE;
    }

    /**
     * @return bool
     */
    public function isStatusRented()
    {
        return $this->status === self::STATUS_RENTED;
    }

    public function setStatusToRented()
    {
        $this->status = self::STATUS_RENTED;
    }

    /**
     * @return bool
     */
    public function isStatusInactive()
    {
        return $this->status === self::STATUS_INACTIVE;
    }

    public function setStatusToInactive()
    {
        $this->status = self::STATUS_INACTIVE;
    }
}
