import { useState } from 'react';
import { Menu, X, Sparkles, LogIn, MessageSquare } from 'lucide-react';
import GlassSurface from '../GlassSurface';
import './GlassNavbar.css';

const GlassNavbar = ({
  logo = 'Vertex',
  navItems = [
    { label: 'Features', href: '#features' },
    { label: 'Pricing', href: '#pricing' },
    { label: 'About', href: '#about' },
    { label: 'Contact', href: '#contact' }
  ],
  ctaText = 'Chat now',
  loginText = 'Login',
  showBadge = false,
  badgeText = 'Powered by Mistral',
  position = 'floating',
  variant = 'default'
}) => {
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  const toggleMobileMenu = () => {
    setIsMobileMenuOpen(!isMobileMenuOpen);
  };

  const handleNavClick = (href) => {
    if (href.startsWith('#')) {
      const element = document.querySelector(href);
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
      }
    } else {
      window.location.href = href;
    }
    setIsMobileMenuOpen(false);
  };

  const navbarClasses = `glass-navbar glass-navbar--${position} glass-navbar--${variant}`;

  return (
    <nav 
    className={navbarClasses} 
    style={{
      position: position === 'floating' ? 'fixed' : 'sticky',
      top: position === 'floating' ? '1.5rem' : '0',
      left: '50%',
      transform: 'translateX(-50%)',
      width: position === 'floating' ? 'calc(100% - 3rem)' : '100%',
      maxWidth: '1400px',
      zIndex: 1000
    }}>
      <div className="glass-navbar__container">
        <GlassSurface
          width="100%"
          height="auto"
          borderRadius={position === 'floating' ? 16 : 0}
          borderWidth={0.08}
          brightness={50}
          opacity={0.95}
          blur={12}
          displace={0}
          backgroundOpacity={0.1}
          saturation={1.2}
          distortionScale={-180}
          redOffset={0}
          greenOffset={10}
          blueOffset={20}
          className="glass-navbar__surface"
        >
          <div className="glass-navbar__content">
            <div className="glass-navbar__brand">
              <h1 className="glass-navbar__logo">{logo}</h1>
              {showBadge && (
                <div className="glass-navbar__badge">
                  <Sparkles size={12} />
                  <span>{badgeText}</span>
                </div>
              )}
            </div>

            <div className="glass-navbar__nav glass-navbar__nav--desktop">
              {navItems.map((item, index) => (
                <button
                  key={index}
                  onClick={() => handleNavClick(item.href)}
                  className="glass-navbar__link"
                >
                  {item.label}
                </button>
              ))}
            </div>

            <div className="glass-navbar__actions glass-navbar__actions--desktop">
              <button
                onClick={() => handleNavClick('#login')}
                className="glass-navbar__btn glass-navbar__btn--secondary"
              >
                <LogIn size={18} />
                <span>{loginText}</span>
              </button>
            </div>

            <button
              className="glass-navbar__mobile-toggle"
              onClick={toggleMobileMenu}
              aria-label="Toggle menu"
            >
              {isMobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
            </button>
          </div>
        </GlassSurface>

        {isMobileMenuOpen && (
          <div className="glass-navbar__mobile-menu">
            <GlassSurface
              width="100%"
              height="auto"
              borderRadius={16}
              borderWidth={0.08}
              brightness={50}
              opacity={0.98}
              blur={14}
              backgroundOpacity={0.15}
              saturation={1.2}
              className="glass-navbar__mobile-surface"
            >
              <div className="glass-navbar__mobile-content">
                <div className="glass-navbar__mobile-nav">
                  {navItems.map((item, index) => (
                    <button
                      key={index}
                      onClick={() => handleNavClick(item.href)}
                      className="glass-navbar__mobile-link"
                    >
                      {item.label}
                    </button>
                  ))}
                </div>

                <div className="glass-navbar__mobile-actions">
                  <button
                    onClick={() => handleNavClick('#login')}
                    className="glass-navbar__btn glass-navbar__btn--secondary glass-navbar__btn--mobile"
                  >
                    <LogIn size={18} />
                    <span>{loginText}</span>
                  </button>
                  <button
                    onClick={() => handleNavClick('#chat')}
                    className="glass-navbar__btn glass-navbar__btn--primary glass-navbar__btn--mobile"
                  >
                    <MessageSquare size={18} />
                    <span>{ctaText}</span>
                  </button>
                </div>
              </div>
            </GlassSurface>
          </div>
        )}
      </div>
    </nav>
  );
};

export default GlassNavbar;
