import '../css/app.css';
import gamadent from '../views/files/img/gamadent.svg'
import calling from '../views/files/img/Calling.svg'
import Anasayfa from "../views/files/pages/Anasayfa";
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import { NavLink } from 'react-router-dom';
import Blogs from '../views/files/pages/Blogs'
import Blogs1 from '../views/files/pages/Blogs1'
import dentist from '../views/files/img/dentist.png'
import whatsapp from '../views/files/img/whatsapp-svgrepo-com.svg'
import { FloatingWhatsApp } from 'react-floating-whatsapp'





import Hizmetler from "../views/files/pages/hizmetler";
import Hakkimda from "../views/files/pages/Hakkimda";
import Iletisim from "../views/files/pages/iletisim";
import NavBar from "../views/files/pages/NavBar";
import React, { useState } from "react";


function App() {

    let phoneNumber = "0546 512 6090"

    phoneNumber = phoneNumber.split(' ').join('');


    const [menu, setMenu] = useState(false)
    return (
        <div className="flex justify-start items-center flex-col ">

            <Router>

                <NavBar smenu={menu} setsmenu={setMenu} />

                <div className={'w-full h-screen'}>
                    <Routes>
                        <Route path={'/'} element={<Anasayfa phonen={phoneNumber} />} />
                        <Route path={'/hizmetler'} element={<Hizmetler phonen={phoneNumber} />} />
                        <Route path={'/blogs'} element={<Blogs phonen={phoneNumber} />} />
                        <Route path={'/hakkimda'} element={<Hakkimda phonen={phoneNumber} />} />
                        <Route path={'/iletisim'} element={<Iletisim phonen={phoneNumber} />} />
                        <Route path={'/blogs/blogs1'} element={<Blogs1 phonen={phoneNumber} />} />
                    </Routes>

                </div>

            </Router>
            <div className={'relative h-screen'}>
                <img className={'absolute right-0 bottom-0 h-[300px] w-[300px]'} src={whatsapp} alt="" />
            </div>
            <FloatingWhatsApp statusMessage={'Son Görülme: Çevrimiçi'} chatMessage={'Merhaba! 🤝\nNasıl yardımcı olabilirim?'} phoneNumber={'0553 553 53 53'} accountName={'Gamedent'} />

        </div>
    );
}

export default App;
