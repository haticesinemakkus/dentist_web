import React, { useState } from 'react';
import articles1 from "../img/anasayfa/articles/articles1.png";
import { Swiper, SwiperSlide } from "swiper/react";
import docphoto1 from "../img/anasayfa/doctors/Group 1000001017.png";
import docphoto2 from "../img/anasayfa/doctors/Group 1000001018.png";
import docphoto3 from "../img/anasayfa/doctors/Group 1000001019.png";
import docphoto4 from "../img/anasayfa/doctors/Group 1000001020.png";
import docphoto5 from "../img/anasayfa/doctors/Mask group.png";

import hakkimdadoc1 from '../img/hakkimda/doct1.png'

import uzmanlar1 from '../img/hakkimda/uzmanlar1.png'
import uzmanlar2 from '../img/hakkimda/uzmanlar2.png'
import uzmanlar3 from '../img/hakkimda/uzmanlar3.png'

import teknelojifoto from '../img/hakkimda/teknelojifoto.png'
import dish1 from "../img/anasayfa/dish1.png";
import rightcircle from "../img/anasayfa/Arrow - Right Circle.png";
import disestetigi from "../img/anasayfa/disestetigi.png";
import dishimplant from "../img/anasayfa/dishasd.png";
import oynatdeneme from "../img/blogs/oynatdeneme.png";
import Footer from "./Footer";
import VideoFile from "./VideoFile";
import { useNavigate } from "react-router-dom";
import { useEffect } from "react";

const Hakkimda = () => {
    const navigate = useNavigate()
    const handleRedirect = (item) => {

        navigate(`${item}`);


        window.scrollTo(0, 0);
    };
    const [services, setServices] = useState([]);
    const [teamMembers, setTeamMembers] = useState([]);
    const [settings, setSetting] = useState([]);

    useEffect(() => {
        fetch('/api/randomservices')
            .then(response => response.json())
            .then(data => setServices(data))
            .catch(error => console.error('API Hatası:', error));
    },
        [services]);

    useEffect(() => {
        fetch('/api/teams')
            .then(response => response.json())
            .then(data => setTeamMembers(data))
            .catch(error => console.error('API Hatası:', error));
    },
        [teamMembers]);
    useEffect(() => {
        fetch('/api/setting')
            .then(response => response.json())
            .then(data => setSetting(data))
            .catch(error => console.error('API Hatası:', error));
    }, [settings]);
    return (
        <div className={'mt-[140px] flex justify-center items-center'}>
            <div className={'w-[1440px] h-full'}>
                <div className={'flex justify-center items-center'}>
                    <h2 className={'font1 text-5xl sm:text-6xl'}>Hakkımızda</h2>
                </div>
                <div className={'mt-[70px] w-full flex justify-center items-center md:flex-col flex-col lg:flex-row 2xl:flex-row gap-[80px]'}>
                    <div className={'flex flex-col '}>
                        <div className={'mt-[15px] w-fit text-3xl sm:text-4xl font1'}>Misyonumuz</div>
                        {settings.map((setting, index) => (
                            <h2 className={'text-lg  2xl:w-[800px] xl:w-[500px] lg:w-[500px] md:w-[700px] sm:w-[500px] w-[310px] mt-[20px] text-text2 font10'}>
                                {setting.about_us}
                            </h2>
                        ))}
                    </div>
                    <img className={'xl:w-[453px] md:w-[300px] w-[300px]'} src={hakkimdadoc1} alt="" />
                </div>
                <div className={'mt-[120px] flex flex-col justify-center items-center'}>
                    <div className={'flex flex-col justify-center items-center'}>
                        <h2 className={'font1 text-3xl sm:text-4xl w-[330px] lg:text-4xl xl:text-5xl md:text-5xl md:w-[500px] lg:w-fit text-center'}>
                            Uzmanlarımızı Yakından Tanıyın
                        </h2>
                        <h2 className={'font4 text-lg md:text-xl w-[310px] sm:w-[400px] md:w-[515px] mt-[40px] text-text2 text-center'}>
                            We use only the best quality materials on the market in order to provide the best products to our patients.
                        </h2>

                    </div>
                    <div className={'mt-[120px] gap-[70px] flex flex-col justify-center items-center'}>
                        {teamMembers.map((member, index) => (

                            <div className={'flex md:flex-col flex-col justify-center items-center lg:flex-row gap-[30px]'} >
                                <img className={'md:w-[600px] lg:w-[306px]'} src={`/upload/team/${member.image}`} alt="" />
                                <div className={'flex flex-col justify-center items-center lg:justify-start lg:items-start'}>
                                    <div className={'flex sm:flex-row flex-col gap-[16px] items-center'}>
                                        <h2 className={'font6 !2xl:text-xl text-2xl md:text-4xl'}>Dr. {member.name}</h2>
                                        <h3 className={'font4 2xl:text-sm text-base md:text-2xl'}>({member.title})</h3>
                                    </div>
                                    <div className={'font11 2xl:text-[18px] md:text-[20px] mt-4 lg:w-[600px] sm:w-[500px] w-[330px] md:w-[650px] xl:w-[757px] text-text2'}>
                                        {member.description}
                                    </div>
                                    <div onClick={() => { handleRedirect('/iletisim') }} className={'hover:bg-bg6 bg-bg2 w-fit mt-[35px] h-[35px] sm:p-[40px] p-[25px] lg:p-[25px] flex justify-center items-center rounded-md cursor-pointer cursor-pointer'}>
                                        <h2 className={'text-white font9 sm:text-3xl lg:text-lg'}>Randevu Al</h2>
                                    </div>
                                </div>
                            </div>

                        ))}
                        <hr className={'w-full'} />
                    </div>
                    <div className={'mt-[120px] flex flex-col justify-center items-center'}>
                        <div className={'flex flex-col justify-center items-center'}>
                            <h2 className={'font1 lg:text-4xl xl:text-5xl text-center sm:w-fit w-[300px] text-3xl sm:text-4xl'}>
                                Teknolojiyi Yakından Takip Ediyoruz
                            </h2>
                            <h2 className={'font4 text-lg md:text-xl w-[310px] sm:w-[400px] md:w-[515px] mt-[40px] text-text2 text-center'}>
                                We use only the best quality materials on the market in order to provide the best products to our patients.
                            </h2>

                        </div>
                        <div className={'mt-[100px] w-full flex justify-center items-center flex-col lg:flex-row gap-[20px]'}>
                            <img className={'w-[310px] md:w-full'} src={teknelojifoto} alt="" />
                            <div className={'flex flex-col justify-start items-center'}>
                                <div className={'sm:w-fit w-[310px] text-center  text-xl font2'}>Diş Hekimliğinin Geleceği Dijitaldir:</div>
                                <h2 className={'text-lg lg:w-[450px] w-[320px] sm:w-[500px] xl:w-[650px] flex flex-col gap-[25px] mt-[15px]  text-text2 font10 text'}>
                                    Dijital diş hekimliği, diş hekimliğinde geleneksel yöntemlerle yapılan işlemlerin bilgisayar desteği ile tasarım ve üretimine olanak tanıyan bir sistemdir.
                                    Diş hekimliğinde geleneksel yöntemler yerine bilgisayar teknolojisinden destek almanın çok sayıda avantajı vardır.
                                    İşlem süresi oldukça kısalmıştır. Ölçü alma işlemi 3-4 dakika içinde gerçekleşmektedir. Dişler aynı gün içerisinde hazırlanabildiğinden, tedavi de aynı gün tamamlanabilmektedir.
                                    <h2>
                                        Ölçü alma ve tasarım aşamaları hastalar açısından daha konforlu hale gelmiştir.
                                        Öğürme refleksi ve mide bulantısı olan hasta grubunda güvenli bir şekilde kullanılabilir.
                                        Hata ihtimali azaltılmış olur.
                                    </h2>
                                    <h2>
                                        Dijital ortama aktarılan görüntüler; üzerinde istediğimiz şekilde ölçüm, tasarım ve değişiklik yapmamıza olanak tanır. Tasarlanan dişlerde aşındırma, ekleme, kontak nokta kontrolleri, kontur değişiklikleri yaparak dişlerin olası bitmiş halini önceden elde edebilmekteyiz.
                                        Dilersek bu tasarlanan dişlerin ağız içindeki görüntülerini, hastanın profil görüntüleri ile birleştirerek, işlem sonrası hastalarımızın nasıl bir gülüş elde edebileceğini önceden gösterebilmekteyiz.
                                    </h2>
                                </h2>

                            </div>
                        </div>
                    </div>

                </div>
                <div className={'mt-[120px]'}>
                    <div className={'flex justify-center items-center '}>
                        <div className={'bg-text2 w-fit px-[5vw] rounded-lg flex md:flex-row flex-col   py-[50px] gap-[30px] justify-center items-center md:h-[550px] lg:h-[450px]'}>
                            {services.map((service, index) => (
                                <div className={'2xl:w-[400px]  xl:w-[330px] lg:w-[250px] md:w-[200px] py-[15px] md:px-[20px] lg:px-[35px] md:h-[450px] lg:h-full gap-[16px] rounded-xl  bg-white flex justify-start items-center flex-col'}>
                                    <img className={'xl:w-[60px] lg:w-[50px]'} src={dish1} alt="" />
                                    <h1 className={'font2 text-black lg:text-xl md:text-2xl text-center text-2xl xl:text-2xl'}>
                                        {service.title}
                                    </h1>
                                    <h1 className={'font4 text-text2 px-4 md:h-[170px] lg:h-32 2xl:text-lg text-base text-center '}>
                                        {service.content}
                                    </h1>
                                    <div onClick={() => { handleRedirect('/hizmetler') }} className={'flex cursor-pointer  md:flex-col lg:flex-row gap-[12px] justify-center items-center'}>
                                        <h2 className={'text-lg font4 underline'}>Diğer Hizmetler</h2>
                                        <img src={rightcircle} alt="" />
                                    </div>
                                </div>
                            ))}
                        </div>

                    </div>
                </div>
                <div className={'mt-[120px]'}>
                    <div className={'flex flex-col justify-center items-center'}>
                        <h2 className={'font1 text-3xl sm:text-5xl w-[350px] sm:w-[500px] text-center'}>
                            Sizinle Tanışmak İçin
                            Sabırsızlanıyoruz
                        </h2>
                        <h2 className={'font4 text-lg md:text-xl w-[310px] sm:w-[400px] md:w-[515px] mt-[40px] text-text2 text-center'}>
                            We use only the best quality materials on the market in order to provide the best products to our patients.
                        </h2>
                        <div className={'mt-[30px] sm:w-[500px] w-[320px]'}>
                            {/*<img src={oynatdeneme} alt=""/>*/}
                            <VideoFile />
                        </div>
                    </div>
                </div>
                <Footer />
            </div>

        </div>
    );
};

export default Hakkimda;
