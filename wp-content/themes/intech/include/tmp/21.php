<?php
$gardian_data = [
    'agr[GUID]' => '',
    'agr[Blank][BlankGUID]' => '',
    'agr[Blank][BlankName]' => '',
    'agr[Blank][BlankComment]' => '',
    'agr[Blank][BlankComment2]' => '',
    'agr[Blank][NumberLength]' => 0,
    'agr[BlankNumber]' => 0,
    'agr[Sticker][BlankGUID]' => '37e5ec78_2fe2_11ec_b1b2_00155dae7a01', // Тип номерного бланка GUID (Всегда такое значение)
    'agr[Sticker][BlankName]' => 'GR', // Тип номерного бланка (Всегда такое значение)
    'agr[Sticker][BlankComment]' => '',
    'agr[Sticker][BlankComment2]' => '',
    'agr[Sticker][NumberLength]' => 0,
    'agr[StickerNumber]' => $blank_number,
    'agr[Number]' => '',
    'agr[Product]' => 'ВЗРКон',
    'agr[Date]' => $date_now,
    'agr[BegDate]' => $date_from,
    'agr[EndDate]' => $date_to,
    'agr[Summ]' => $rate_price * $rate_coefficient,
    'agr[Customer][CustomerName]' => $surname . ' ' . $name,
    'agr[Customer][CustomerFullName]' => $surname . ' ' . $name,
    'agr[Customer][CustomerFName]' => '',
    'agr[Customer][CustomerLName]' => '',
    'agr[Customer][CustomerSName]' => '',
    'agr[Customer][CustomerType]' => 'person',
    'agr[Customer][CustomerCode]' => $inn,
    'agr[Customer][CustomerBDate]' => $birthday,
    'agr[Customer][CustomerForeigner]' => 'false',
    'agr[Customer][CustomerPersonWithoutCode]' => 'false',
    'agr[Customer][CustomerPhone]' => $gardian_phone,
    'agr[Customer][CustomerAddress]' => $address,
    'agr[Customer][CustomerAddressLat]' => $address,
    'agr[Customer][CustomerPassport][DocType]' => '',
    'agr[Customer][CustomerPassport][DocSeries]' => '',
    'agr[Customer][CustomerPassport][DocNumber]' => '',
    'agr[Customer][CustomerPassport][DocDate]' => '',
    'agr[Customer][CustomerPassport][DocSourceOrg]' => '',
    'agr[Customer][CustomerDriversLicense][DocType]' => '',
    'agr[Customer][CustomerDriversLicense][DocSeries]' => '',
    'agr[Customer][CustomerDriversLicense][DocNumber]' => '',
    'agr[Customer][CustomerDriversLicense][DocDate]' => '0001-01-01T00:00:00',
    'agr[Customer][CustomerDriversLicense][DocSourceOrg]' => '',
    'agr[Customer][CustomerPreferentialDocument][DocType]' => '',
    'agr[Customer][CustomerPreferentialDocument][DocSeries]' => '',
    'agr[Customer][CustomerPreferentialDocument][DocNumber]' => '',
    'agr[Customer][CustomerPreferentialDocument][DocDate]' => '0001-01-01T00:00:00',
    'agr[Customer][CustomerPreferentialDocument][DocSourceOrg]' => '',
    'agr[Customer][CustomerInternationalPassport][DocType]' => 'InternationalPassport',
    'agr[Customer][CustomerInternationalPassport][DocSeries]' => $passport_series,
    'agr[Customer][CustomerInternationalPassport][DocNumber]' => $passport_number,
    'agr[Customer][CustomerInternationalPassport][DocDate]' => '0001-01-01',
    'agr[Customer][CustomerInternationalPassport][DocSourceOrg]' => '',
    'agr[Customer][CustomerNameLat]' => $surname . ' ' . $name,
    'agr[Customer][CustomerIncorrectCode]' => 'false',
    'agr[Customer][CustomerContactPerson]' => '',
    'agr[Customer][CustomerBankAccount]' => '',
    'agr[Customer][CustomerGUID]' => '',
    'agr[Customer][CustomerCitizenshipCountry][EnumVal]' => '',
    'agr[Customer][CustomerCitizenshipCountry][EnumName]' => '',
    'agr[Customer][CustomerCitizenshipCountry][EnumFlag]' => 'false',
    'agr[Customer][CustomerCitizenshipCountry][EnumRate]' => 0,
    'agr[Customer][CustomerEmail]' => $email,
    'agr[Customer][CustomerEDDRCode]' => '',
    'agr[Customer][CustomerGender]' => $sex,
    'agr[Beneficiary]' => '',
    'agr[BeneficiaryIsCustomer]' => 'false',
    'agr[Srok]' => 0,
    'agr[BonusMalus]' => 0,
    'agr[Zone]' => 0,
    'agr[Objects][0][Mark]' => '',
    'agr[Objects][0][Model]' => '',
    'agr[Objects][0][VIN]' => '',
    'agr[Objects][0][RegNum]' => '',
    'agr[Objects][0][YearOfCreation]' => 0,
    'agr[Objects][0][Type]' => '',
    'agr[Objects][0][ObjectGUID]' => '',
    'agr[Objects][0][Name]' => $surname . ' ' . $name,
    'agr[Objects][0][NameLat]' => $surname . ' ' . $name,
    'agr[Objects][0][Date]' => $birthday,
    'agr[Objects][0][InternationalPassport][DocType]' => '',
    'agr[Objects][0][InternationalPassport][DocSeries]' => $passport_series,
    'agr[Objects][0][InternationalPassport][DocNumber]' => $passport_number,
    'agr[Objects][0][InternationalPassport][DocDate]' => '0001-01-01T00:00:00',
    'agr[Objects][0][InternationalPassport][DocSourceOrg]' => '',
    'agr[Objects][0][Address]' => $address,
    'agr[Objects][0][Phone]' => $gardian_phone,
    'agr[Objects][0][DecimalOption1]' => $rate_price * $rate_coefficient,
    'agr[Objects][0][DecimalOption2]' => 0,
    'agr[Objects][0][AddressLat]' => $address,
    'agr[Objects][0][ObjType]' => '',
    'agr[Objects][0][StringOption1]' => '',
    'agr[UnusedMonthes][M1]' => 'false',
    'agr[UnusedMonthes][M2]' => 'false',
    'agr[UnusedMonthes][M3]' => 'false',
    'agr[UnusedMonthes][M4]' => 'false',
    'agr[UnusedMonthes][M5]' => 'false',
    'agr[UnusedMonthes][M6]' => 'false',
    'agr[UnusedMonthes][M7]' => 'false',
    'agr[UnusedMonthes][M8]' => 'false',
    'agr[UnusedMonthes][M9]' => 'false',
    'agr[UnusedMonthes][M10]' => 'false',
    'agr[UnusedMonthes][M11]' => 'false',
    'agr[UnusedMonthes][M12]' => 'false',
    'agr[OTKFlag]' => 'false',
    'agr[OTK6Flag]' => 'false',
    'agr[OTKDate]' => '0001-01-01T00:00:00',
    'agr[Preference]' => '',
    'agr[Franchise]' => $rate_franchise_number,
    'agr[OSAGOValues][K1]' => 0,
    'agr[OSAGOValues][K2]' => 0,
    'agr[OSAGOValues][K3]' => 0,
    'agr[OSAGOValues][K4]' => 0,
    'agr[OSAGOValues][K5]' => 0,
    'agr[OSAGOValues][K6]' => 0,
    'agr[OSAGOValues][K7]' => 0,
    'agr[OSAGOValues][K8]' => 0,
    'agr[OSAGOValues][K9]' => 0,
    'agr[PayDate]' => '0001-01-01T00:00:00',
    'agr[PayDoc]' => '',
    'agr[RegistrationPlace]' => '',
    'agr[StazhDo3Let]' => 'false',
    'agr[CommerceUse]' => 'false',
    'agr[Status]' => $gardian_status,
    'agr[Deleted]' => 'false',
    'agr[ParentAgreementGUID]' => '',
    'agr[ParentAgreementNumber]' => '',
    'agr[ParentAgreementDate]' => '0001-01-01T00:00:00',
    'agr[CrossAgreementGUID]' => '',
    'agr[CrossAgreementNumber]' => '',
    'agr[CrossAgreementDate]' => '0001-01-01T00:00:00',
    'agr[BlankStatus]' => '',
    'agr[SalesChannelGUID]' => 'bd909c32_2b2a_11eb_b19b_00155df66a18', // Канал продажу: Агентський - Агенти-вільний ринок  (Всегда)
    'agr[SalesChannelParentGUID]' => '',
    'agr[Partner]' => '',
    'agr[ParkDiscount]' => 0,
    'agr[ParkDiscountStr]' => '',
    'agr[BMR]' => 'false',
    'agr[ValidationCode]' => '',
    'agr[Countries]' => '047c8592-4e59-11eb-b19c-00155df66a18', // Територія покриття: Європа / Europe (Всегда)
    'agr[Country]' => '',
    'agr[PaymentSchedule][0][PaymentNum]' => 0,
    'agr[PaymentSchedule][0][PaymentDate]' => '0001-01-01T00:00:00',
    'agr[PaymentSchedule][0][PaymentSum]' => 0,
    'agr[SpecialTariff]' => 'false',
    'agr[MultiUse]' => 'false',
    'agr[BoolOption1]' => 'false',
    'agr[BoolOption2]' => 'true',
    'agr[BoolOption3]' => 'false',
    'agr[BoolOption4]' => 'false',
    'agr[BoolOption5]' => 'false',
    'agr[StringOption1]' => '',
    'agr[StringOption2]' => '',
    'agr[Currency]' => 'EUR',
    'agr[AgreementType]' => '',
    'agr[DurationType]' => $count_days,
    'agr[KV]' => 0,
    'agr[Summ1]' => $gardian_rate_insured_sum,
    'agr[Summ2]' => 0,
    'agr[Summ3]' => 0,
    'agr[Summ4]' => 0,
    'agr[Summ5]' => 0,
    'agr[Tariff]' => 0,
    'agr[Prem1]' => $rate_price * $rate_coefficient,
    'agr[Prem2]' => 0,
    'agr[Prem3]' => 0,
    'agr[Prem4]' => 0,
    'agr[Prem5]' => 0,
    'agr[Corr1]' => 0,
    'agr[Corr2]' => 0,
    'agr[Corr3]' => 0,
    'agr[CurrencyRate]' => $currencyRate,
    'agr[TerritorySPType]' => '',
    'agr[Sighner][EnumVal]' => '',
    'agr[Sighner][EnumName]' => '',
    'agr[Sighner][EnumFlag]' => 'false',
    'agr[Sighner][EnumRate]' => 0,
    'agr[ProxyDoc][EnumVal]' => '',
    'agr[ProxyDoc][EnumName]' => '',
    'agr[ProxyDoc][EnumFlag]' => 'false',
    'agr[ProxyDoc][EnumRate]' => 0,
    'agr[MaxTariff]' => 'false',
    'agr[IsPaid]' => 'false',
    'agr[Agent][EnumVal]' => '',
    'agr[Agent][EnumName]' => '',
    'agr[Agent][EnumFlag]' => 'false',
    'agr[Agent][EnumRate]' => 0,
    'agr[ProductGUID]' => $gardian_product_id,
    'agr[TariffProp]' => '',
    'agr[Digital]' => 'false',
    'agr[Password]' => '',
    'agr[UsedBlanks]' => ''
];