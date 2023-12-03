import React, {useState} from 'react';
import dish1 from "../img/anasayfa/dish1.svg";
import dish2 from "../img/anasayfa/dish2.svg";
import dish3 from "../img/anasayfa/dish3.svg";
import dish4 from "../img/anasayfa/dish4.svg";
import dish5 from "../img/anasayfa/dish5.svg";
import dish6 from "../img/anasayfa/dish6.svg";

import rightcircle from "../img/anasayfa/Arrow - Right Circle.png";
import disestetigi from "../img/anasayfa/disestetigi.png";
import dishimplant from "../img/anasayfa/dishasd.png";

import disbeyazlatma from '../img/anasayfa/disbeyazlatma.png'
import acildis from '../img/anasayfa/acildis.png'
import onleme from '../img/anasayfa/onleme.png'
import {Swiper, SwiperSlide} from "swiper/react";
import docphoto1 from "../img/anasayfa/doctors/Group 1000001017.png";
import docphoto2 from "../img/anasayfa/doctors/Group 1000001018.png";
import docphoto3 from "../img/anasayfa/doctors/Group 1000001019.png";
import docphoto4 from "../img/anasayfa/doctors/Group 1000001020.png";
import docphoto5 from "../img/anasayfa/doctors/Mask group.png";
import AccordionEmre from "./AccordionEmre";
import oyununkaderi from "../img/anasayfa/oyunkaderi.png";
import Footer from "./Footer";
import {useNavigate} from "react-router-dom";
import { useEffect } from 'react';


const Hizmetler = () => {

    const navigate = useNavigate()
    const handleRedirect = (item) => {

        navigate(`${item}`);


        window.scrollTo(0, 0);
    };

    const [teamMembers, setTeamMembers] = useState([]);
    const [services, setServices] = useState([]);
    const [successMessage, setSuccessMessage] = useState(null);

    useEffect(() => {
        fetch('/api/teams')
            .then(response => response.json())
            .then(data => setTeamMembers(data))
            .catch(error => console.error('API Hatası:', error));
    },
    [teamMembers]);

    useEffect(() => {
        fetch('/api/services')
            .then(response => response.json())
            .then(data => setServices(data))
            .catch(error => console.error('API Hatası:', error));
    },
        [services]);

    const [formData, setFormData] = useState({
        name: "",
        phone: "",
        services: "",
    });
    const handleSubmit = async () => {
        try {
            const response = await fetch('/api/appointment_request', {
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
        <div className={'w-full h-full'}>
            <div className={'mt-[140px]'}>
                <div className={'flex flex-col justify-center items-center'}>
                    <h2 className={'font1 xl:text-6xl text-5xl 2xl:text-6xl'}>
                        Hizmetlerimiz
                    </h2>
                    <h2 className={'font4 text-lg xl:text-xl w-[320px] md:w-[450px] lg:w-[515px] mt-[40px] text-text2 text-center'}>
                        We use only the best quality materials on the market in order to provide the best products to our patients.                        </h2>

                </div>
                <div className={'w-full bg3 flex flex-col justify-center items-center py-[50px]  mt-[70px]'}>
                    <div className={' w-fit rounded-lg grid md:grid-row grid-cols2 md:grid-cols-3 flex-col px-[35px]  py-[50px] gap-[30px] justify-center items-center h-fit lg:h-fit'}>
                        {services.map((service, index) => (
                        <div className={'2xl:w-[400px] xl:w-[330px] lg:w-[250px] md:w-[200px] py-[15px] md:px-[20px] lg:px-[35px] md:h-[450px] lg:h-full gap-[16px] rounded-xl  bg-white flex justify-start items-center flex-col'}>
                            <img className={'xl:w-[60px] lg:w-[50px]'} src={dish1} alt=""/>
                            <h1 className={'font2 text-black lg:text-xl md:text-2xl text-center text-2xl xl:text-2xl'}>
                                {service.title}
                            </h1>
                            <h1 className={'font4 text-text2 md:h-[170px] px-4 lg:h-32 2xl:text-lg text-base text-center '}>
                                {service.content}
                            </h1>
                            <div  className={'flex  md:flex-col lg:flex-row gap-[12px] justify-center items-center pb-6'}>
                                <h2 className={'text-lg font4 underline'}>Randevu Oluştur</h2>
                                <img src={rightcircle} alt=""/>
                            </div>
                        </div>
                        ))}
                    </div>

                </div>
            </div>
            <div className={'mt-[120px]'}>
                <div className={'w-full h-fit bg-bg5 md:p-16 p-16 lg:p-10 xl:gap-[60px] sm:p-16  flex justify-center items-center md:flex-col lg:flex-row flex-col'}>
                    <div className={'flex flex-col justify-center md:items-start items-center  md:p-0 '}>
                        <h1 className={'font1 text-white text-3xl w-[330px] lg:text-3xl xl:text-5xl sm:w-[400px] md:text-3xl md:w-[400px] lg:w-[500px] xl:w-[650px] leading-8'}>
                            daha sağlıklı ve mutlu gülümsemeler için hemen iletişime geçin
                        </h1>
                        <h2 className={'font3 text-xl text-white w-[330px] lg:w-[450px] sm:w-[400px] md:w-[400px] xl:w-[550px] mt-[45px]  '}>
                            We use only the best quality materials on the market in order to provide the best products to our patients, So don’t worry about anything and book yourself.
                        </h2>


                    </div>
                    <div className={'xl:w-[400px] lg:m-0 mt-12 lg:w-[350px] pb-8 bg-white rounded-[30px] flex-col flex justify-start pt-[34px] px-[30px]'}>
                        <h2 className={'font1 text-2xl'}>Randevu Talebi Oluştur</h2>
                        <div className={'mt-[39px] sm:text-base text-sm w-full flex flex-col gap-[20px]'}>
                            <div className={'w-full h-[50px] bg10 flex'}>
                               <h2 className={'px-[20px] py-[14px] text-text4'}>
                                   <input className={'w-full h-full border-none outline-none'} placeholder={'Tam Adınız'} type="text"
                                        name="name"
                                        value={formData.name}
                                        onChange={handleInputChange}/>
                               </h2>
                            </div>
                            <div className={'w-full h-[50px] bg10 flex'}>
                                <h2 className={'px-[20px] py-[14px] text-text4'}>
                                    <input className={'w-full h-full border-none outline-none'} placeholder={'Telefon Numaranız'} type="text"
                                        name="phone"
                                        value={formData.phone}
                                        onChange={handleInputChange}/>
                                </h2>
                            </div>
                            <div className={'w-full h-fit bg10 flex'}>
                                <h2 className={'px-[20px] py-[14px] text-text4'}>
                                    <input className={'w-full h-full border-none outline-none'} placeholder={'Almak İstediğiniz Tedavi'} type="text"
                                        name="services"
                                        value={formData.services}
                                        onChange={handleInputChange}/>
                                </h2>
                            </div>
                            <div className={'flex justify-end w-full'}>
                                {successMessage && (
                                    <div className={'bg-green-500 text-white p-2 rounded-md'}>
                                        {successMessage}
                                    </div>
                                )}
                                <div onClick={handleSubmit} className={'bg-bg2 hover:bg-bg7 cursor-pointer cursor-pointer md:w-full w-full lg:w-[120px] md:h-[55px] md:mt-2 lg:h-[35px] px-[15px] flex justify-center items-center py-[20px] rounded-lg'}>
                                    <h2 className={'text-white font2 text-[24px] md:text-[16px]'}>
                                        İlet
                                    </h2>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div className={'mt-[100px] flex justify-center items-center'}>
                <div className={'w-full sm:h-[700px] bg5 flex justify-start items-center pt-[60px] flex-col'}>
                    <div className={'flex justify-center items-center flex-col'}>
                        <div className={'flex flex-col justify-center items-center'}>
                            <h2 className={'font1 xl:text-5xl text-4xl 2xl:text-6xl w-[200px] sm:w-fit text-center md:text-5xl lg:text-6xl'}>
                                Uzman Ekibimizle tanışın
                            </h2>
                            <h2 className={'font4 text-lg xl:text-xl md:text-md w-[330px] md:w-[400px] lg:w-[515px] mt-[50px] text-text2 text-center'}>
                                We use only the best quality materials on the market in order to provide the best products to our patients.                        </h2>

                        </div>
                        <div className={'mt-[80px]'}>
                            <div className={'flex justify-center items-center w-full'}>
                                <div className={'flex flex-row justify-center items-center gap-[20px] xl:w-[1100px] lg:w-[900px] md:w-[700px] w-[350px] 2xl:w-[1440px]'}>
                                    <Swiper
                                        spaceBetween={60}
                                        slidesPerView={4}
                                        breakpoints={{
                                            350: {
                                                slidesPerView: 1,
                                            },
                                            1024: {
                                                slidesPerView: 4,
                                            },
                                            768: {
                                                slidesPerView: 2,
                                            }
                                        }}
                                    >
                                        {teamMembers.map((member, index) => (
                                            <SwiperSlide>
                                                <div className="relative w-full">
                                                    <img className="w-full h-auto" src={`/upload/team/${member.image}`} alt={member.name} />
                                                    <div className="absolute flex flex-col bg6 p-3 bottom-4 left-4">
                                                        <h2 className="text-2xl xl:text-xl lg:text-lg md:text-xl text-xl text-white">{member.name}</h2>
                                                        <h2 className="text-xl xl:text-lg lg:text-sm md:text-lg text-lg -mt-1 text-white">{member.title}</h2>
                                                    </div>
                                                </div>
                                            </SwiperSlide>
                                        ))}


                                    </Swiper>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div>
                <div className={'mt-[140px] w-full h-full flex-col flex justify-center items-center'}>
                    <div className={'flex flex-col justify-center items-center'}>
                        <h2 className={'font1 xl:text-5xl lg:text-4xl md:text-3xl sm:text-3xl text-2xl w-[300px] sm:w-fit  text-center lg:text-justify 2xl:text-4xl'}>
                            Sıkça Sorulan Sorular
                        </h2>
                        <h2 className={'font4 text-lg md:text-xl w-[310px] sm:w-[515px] mt-[20px] text-text2 text-center'}>
                            We use only the best quality materials on the market in order to provide the best products to our patients.,
                        </h2>
                    </div>
                    <AccordionEmre/>
                </div>
            </div>
            <div className={'mt-[90px] flex justify-center items-center'}>
                <div className={'lg:w-[900px] md:w-[700px] w-[350px] xl:w-[1064px] h-fit pb-10 md:h-[392px] bg-[#374857] rounded-[30px]  xl:gap-[50px] flex justify-center items-center flex-col md:flex-row'}>
                    <div className={'break-words flex flex-col 2xl:text-4xl xl:text-3xl md:text-2xl text-xl p-8 lg:text-4xl'}>
                        <h2 className={'font1 md:w-[300px] lg:w-[500px]  flex flex-col text-white'}>
                            Gamadent ile oyunun kurallarını baştan yazıyoruz!
                        </h2>
                        <h3 className={'font3 text-xl mt-[20px] text-white md:w-[300px] lg:w-[500px] !break-words'}>
                            We use only the best quality materials on the market in order to provide the best products to our patients.                                    </h3>
                        <div onClick={() => {handleRedirect('/iletisim')}} className={'bg-bg2 hover:bg-bg7 cursor-pointer w-[150px] h-[50px] cursor-pointer mt-[20px] md:mt-[40px] px-[0px] flex justify-center items-center py-[20px] rounded-lg'}>
                            <h2 className={'text-white font2 text-[16px]'}>İletişim Bilgisi</h2>
                        </div>
                    </div>
                    <div className={'flex flex-col items-center justify-center'}></div>
                    <img src={oyununkaderi} alt=""/>
                </div>
            </div>
            <Footer/>
        </div>
    );
};

export default Hizmetler;
