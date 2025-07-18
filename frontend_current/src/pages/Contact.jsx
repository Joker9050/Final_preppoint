import React, { useEffect } from 'react';
import { useLocation } from 'react-router-dom';
import Navbar from '../componets/Navbar';
import ContactSection from '../componets/ContactUs';
import Footer from '../componets/Footer';

const Contact = () => {
  const location = useLocation();

  useEffect(() => {
    if (location.hash === '#contact-section') {
      const element = document.getElementById('contact-section');
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
      }
    }
  }, [location]);

  return (
    <>
      <Navbar />
      <ContactSection />
      <Footer />
    </>
  );
};

export default Contact;
