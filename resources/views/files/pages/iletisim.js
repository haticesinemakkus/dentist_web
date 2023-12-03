import React, { useEffect, useState } from 'react';

import harita from '../img/Rectangle1.png'
import 'react-phone-number-input/style.css'
import PhoneInput from 'react-phone-number-input'

import konum from '../img/iletisim/konum.png'
import chat from '../img/iletisim/chat.png'
import downb from '../img/iletisim/downb.png'
import pin from '../img/iletisim/pin 1.png'
import time from '../img/iletisim/time.png'
import telefon from '../img/iletisim/telefon.png'


import DatePicker from "react-datepicker";

import "react-datepicker/dist/react-datepicker.css";
import AccordionEmre from "./AccordionEmre";
import Footer from "./Footer";
const İletisim = (props) => {
    const { phonen } = props;
    const [value, setValue] = useState()
    const [startDate, setStartDate] = useState(new Date());
    const [settings, setSetting] = useState([]);
    useEffect(() => {
        console.log(value)
    }, [value])
    useEffect(() => {
        fetch('/api/setting')
            .then(response => response.json())
            .then(data => setSetting(data))
            .catch(error => console.error('API Hatası:', error));
    }, [settings]);

    const [date, setdate] = useState(null);
    const [successMessage, setSuccessMessage] = useState(null);

    const handleDateChange = (date) => {
        setdate(date);
    };

    const handleTextareaChange = (e) => {
        const { value } = e.target;
        setFormData((prevData) => ({ ...prevData, message: value }));
    };


    const [formData, setFormData] = useState({
        name: "",
        surname: "",
        email: "",
        phone: "",
        date: null,
        message: "",
    });
    const handleSubmit = async () => {
        try {
            const response = await fetch('/api/appointment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            if (response.ok) {
                setSuccessMessage('Randevu talebiniz başarıyla alındı.');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                console.error('Form gönderme hatası:', response.status);
            }
        } catch (error) {
            console.error('Form gönderme hatası:', error);
        }
    };

    const handleInputChange = (e) => {
        const { name, value } = e.target;
        setFormData((prevData) => ({ ...prevData, [name]: value }));
    };

    return (
        <div className={'mt-[120px]'}>
            <div className={'flex flex-col justify-center items-center'}>
                <h2 className={'font1 text-5xl'}>
                    İletişime Geçin
                </h2>
                <h2 className={'font4 text-sm sm:w-[415px] w-[315px] mt-[20px] text-text2 text-center'}>
                    Book an Appointment to treat your teeth right now.
                </h2>

            </div>
            <div className={'flex mt-[80px] items-center justify-center gap-16 xl:gap-8 flex-col xl:flex-row'} >
                {settings.map((setting, index) => (
                    <div className={'flex flex-col w-[330px] sm:w-[503px] xl:w-fit gap-[20px]'}>
                        <div className={'relative '}>
                            <img src={harita} alt="" />
                            <div className={'absolute w-full px-[20px] pb-[20px] bottom-0 left-0'}>
                                <div className={' h-[93px] gap-4 pl-[30px] flex justify-start items-center bg-white rounded-[10px]'}>
                                    <div className={'w-12 h-12 bg13 flex justify-center items-center'}>
                                        <img src={konum} alt="" />
                                    </div>
                                    <div className={'flex justify-center flex-col'}>
                                        <h3 className={'font21'}>Klinik Adresi</h3>
                                        <h2 className={'font4 text-text2'}>{setting.address}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className={' h-[118px] gap-4 pl-[30px] flex justify-start items-center bg15 rounded-[10px]'}>
                            <div className={'w-12 h-12 bg13 flex justify-center items-center'}>
                                <img src={time} alt="" />
                            </div>
                            <div className={'flex justify-center flex-col'}>
                                <h3 className={'font21'}>Çalışma Saatlerimiz</h3>
                                <h2 className={'font4 text-text2 w-[200px] sm:w-[300px]'}>{setting.working_hours}</h2>
                            </div>
                        </div>
                        <a target={"_blank"} href={`mailto:info@gamedent.com`} className={' h-[93px] gap-4 pl-[30px] flex justify-start items-center bg15 rounded-[10px]'}>
                            <div className={'w-12 h-12 bg13 flex justify-center items-center'}>
                                <img src={pin} alt="" />
                            </div>
                            <div className={'flex justify-center flex-col'}>
                                <h3 className={'font21'}>Email Adresimiz</h3>
                                <h2 className={'font4 text-text2'}>{setting.email}</h2>

                            </div>
                        </a>

                        <a target={"_blank"} href={`tel:${phonen}`} className={' h-[93px] gap-4 pl-[30px] flex justify-start items-center bg15 rounded-[10px]'}>
                            <div className={'w-12 h-12 bg13 flex justify-center items-center'}>
                                <img src={telefon} alt="" />
                            </div>
                            <div className={'flex justify-center flex-col'}>
                                <h3 className={'font21'}>Telefon Numaramız</h3>
                                <h2 className={'font4 text-text2'}>{setting.phone}</h2>

                            </div>
                        </a>

                        <a target={"_blank"} href={`https://api.whatsapp.com/send/?phone=9${phonen}&text&type=phone_number&app_absent=0`} className={' h-[93px] gap-4 pl-[30px] flex justify-start items-center bg15 rounded-[10px]'}>
                            <div className={'w-12 h-12 bg13 flex justify-center items-center'}>
                                <img src={chat} alt="" />
                            </div>
                            <div className={'flex justify-center flex-col'}>
                                <h3 className={'font21'}>Whatsapp Hattımız</h3>
                                <h2 className={'font4 text-text2'}>{setting.whatsapp_phone}</h2>

                            </div>
                        </a>

                    </div>
                ))}
                <div className={'flex flex-col w-[330px] sm:w-[700px] px-[46px] py-[30px] h-fit bg16'}>
                    <div className={'flex flex-col w-full sm:flex-row gap-[32px]'}>
                        <div className={'flex flex-col gap-[10px]'}>
                            <h4 className={'flex flex-col font21 text-text2'}>
                                First Name
                            </h4>
                            <div className={'w-[232px] h-[55px] bg17 flex items-center pl-0 text-text4 font4'}>
                                <input className={'w-full h-full m-4 border-none outline-none'} placeholder={'First Name'} type="text" name="name"
                                    value={formData.name}
                                    onChange={handleInputChange} />
                            </div>
                        </div>
                        <div className={'flex w-full flex-col gap-[10px]'}>
                            <h4 className={'flex flex-col font21 text-text2'}>
                                Last Name
                            </h4>
                            <div className={'w-[232px] lg:w-full h-[55px] bg17 flex items-center pl-0 text-text4 font4'}>
                                <input className={'w-full h-full m-4 border-none outline-none'} placeholder={'Last Name'} type="text" name="surname"
                                    value={formData.surname}
                                    onChange={handleInputChange} />
                            </div>
                        </div>
                    </div>
                    <div className={'mt-[20px]'}>
                        <div className={'flex flex-col gap-[10px]'}>
                            <h4 className={'flex flex-col font21 text-text2'}>
                                Email
                            </h4>
                            <div className={'w-full h-[55px] bg17 flex items-center pl-0 text-text4 font4'}>
                                <input className={'w-full h-full m-4 border-none outline-none'} placeholder={'you@company.com'} type="text"
                                    name="email"
                                    value={formData.email}
                                    onChange={handleInputChange} />
                            </div>
                        </div>
                    </div>
                    <div className={'mt-[20px]'}>
                        <div className={'flex flex-col gap-[10px]'}>
                            <h4 className={'flex flex-col font21 text-text2'}>
                                Phone number
                            </h4>
                            <div className={'w-full h-[55px] bg17 gap-4 flex items-center pl-4 text-text4 font4'}>
                                {/*<div className={'flex flex-row'}>
                                    <h2>US</h2>
                                    <img src={downb} alt=""/>
                                </div>
                                <h3 className={'text-sm'}>+1 (555) 000-0000</h3>*/}
                                <PhoneInput
                                    defaultCountry={'TR'}
                                    placeholder="Enter phone number"
                                    name="phone"
                                    value={formData.phone}
                                    onChange={(value) => setFormData((prevData) => ({ ...prevData, phone: value }))}
                                />
                            </div>
                        </div>
                    </div>
                    <div className={'mt-[20px]'}>
                        <div className={'flex flex-col gap-[10px]'}>
                            <h4 className={'flex flex-col font21 text-text2'}>
                                Select Date
                            </h4>
                            <div className={'w-full h-[55px] bg17 flex items-center pl-4 text-text4 font4'}>
                                <DatePicker selected={date} onChange={handleDateChange} />
                            </div>
                        </div>
                    </div>
                    <div className={'mt-[20px] h-full w-full'}>
                        <div className={'flex w-full h-full flex-col gap-[10px]'}>
                            <h4 className={'flex flex-col font21 text-text2'}>
                                Message
                            </h4>
                            <div className={'w-full h-full bg17 flex p-4  text-text4 font4'}>
                                <textarea
                                    className={'w-full h-[162px] max-h-[162px] flex border-none outline-none'}
                                    placeholder={'Message'}
                                    type="text"
                                    value={formData.message}
                                    onChange={(e) => handleTextareaChange(e)}
                                />
                            </div>
                        </div>
                    </div>
                    <div className={'mt-[30px] flex justify-center items-center'}>
                        {successMessage && (
                            <div className={'bg-green-500 text-white p-2 rounded-md'}>
                                {successMessage}
                            </div>
                        )}
                        <div
                            onClick={handleSubmit}
                            className={'bg-bg2 hover:bg-bg7 cursor-pointer w-[250px] h-[55px] px-[15px] flex justify-center items-center py-[30px] rounded-xl'}
                        >
                            <h2 className={'text-white font2 text-[16px]'}>Hemen Randevu Oluştur</h2>
                        </div>
                    </div>

                </div>
            </div>
            <div className={'mt-[140px] w-full h-full flex-col flex justify-center items-center'}>
                <div className={'flex flex-col justify-center items-center'}>
                    <h2 className={'font1 xl:text-5xl lg:text-4xl md:text-3xl sm:text-3xl text-2xl w-[300px] sm:w-fit  text-center lg:text-justify 2xl:text-4xl'}>
                        Sıkça Sorulan Sorular
                    </h2>
                    <h2 className={'font4 text-lg md:text-xl w-[310px] sm:w-[515px] mt-[20px] text-text2 text-center'}>
                        We use only the best quality materials on the market in order to provide the best products to our patients.
                    </h2>
                </div>
                <AccordionEmre />
            </div>
            <Footer />
        </div>
    );
};

export default İletisim;
