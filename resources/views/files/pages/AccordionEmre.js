import React, { useState } from 'react';

import { Accordion, AccordionItem as Item } from "@szhsin/react-accordion";

import arti from '../img/anasayfa/artt.png'
import './accordion.css'
import eksi from '../img/anasayfa/eksi.png'
import { useEffect } from 'react';

const AccordionEmre = () => {
    const [sss, setSSS] = useState([]);
    useEffect(() => {
        fetch('/api/sss')
            .then(response => response.json())
            .then(data => setSSS(data))
            .catch(error => console.error('API Hatası:', error));
    }, []);
    console.log(sss);

    const AccordionItem = ({ header, ...rest }) => (
        <Item
            {...rest}
            header={({ state: { isEnter } }) => (
                <>
                    {header}
                    <img
                        className={`ml-auto transition-transform duration-200 ease-out ${isEnter && "rotate-180"
                            }`}
                        src={isEnter ? eksi : arti}
                        alt="Chevron"
                    />
                </>
            )}
            className="border-b"
            buttonProps={{
                className: ({ isEnter }) =>
                    `flex w-full p-4 text-left text-base md:text-lg p-8 hover:bg-slate-100 ${isEnter && "bg-slate-200"
                    }`
            }}
            contentProps={{
                className: "transition-height text-base duration-200 ease-out"
            }}
            panelProps={{ className: "p-4" }}
        />
    );

    return (
        <div className={'flex justify-center mt-[46px] items-center'}>
            <div className="mx-2 my-4 w-[330px] md:w-[630px] ">
                {/* `transitionTimeout` prop should be equal to the transition duration in CSS */}
                <Accordion transition transitionTimeout={200}>
                    {sss.map((member, index) => (
                        <AccordionItem key={index} header={member.question} initialEntered>
                            {member.answer}
                        </AccordionItem>
                    ))}
                </Accordion>
            </div>
        </div>
    );
};

export default AccordionEmre;
