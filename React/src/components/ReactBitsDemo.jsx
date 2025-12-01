import { BlurText, CircularText, RotatingText, Aurora } from '@/components/ui';
import { Button } from '@/components/ui/button';

export default function ReactBitsDemo() {
  return (
    <div className="relative min-h-screen overflow-hidden">
      {/* Aurora Background */}
      <div className="absolute inset-0 -z-10">
        <Aurora />
      </div>

      {/* Content */}
      <div className="container mx-auto px-4 py-20">
        {/* Hero Section with Rotating Text */}
        <div className="text-center mb-16">
          <h1 className="text-7xl font-bold text-white mb-6">
            <RotatingText
              texts={[
                'Welcome to React Bits',
                'Build Amazing UIs',
                'Animate Everything',
                'Create Magic',
              ]}
              rotationInterval={3000}
              splitBy="characters"
              staggerDuration={0.03}
            />
          </h1>

          <div className="text-2xl text-gray-200 mb-8">
            <BlurText
              text="Beautifully animated components for modern web applications"
              delay={50}
              animateBy="words"
              direction="top"
            />
          </div>

          <Button size="lg" className="mt-4">
            Get Started
          </Button>
        </div>

        {/* Circular Text Demo */}
        <div className="flex justify-center items-center my-20">
          <div className="relative w-64 h-64">
            <CircularText
              text="• React Bits • Animated Components • "
              className="text-blue-400"
            />
          </div>
        </div>

        {/* Features Grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mt-20">
          <div className="bg-white/10 backdrop-blur-lg rounded-lg p-8">
            <h3 className="text-xl font-bold text-white mb-3">
              <BlurText text="Text Animations" delay={100} />
            </h3>
            <p className="text-gray-300">
              Blur, rotate, typewriter, and more text effects
            </p>
          </div>

          <div className="bg-white/10 backdrop-blur-lg rounded-lg p-8">
            <h3 className="text-xl font-bold text-white mb-3">
              <BlurText text="Backgrounds" delay={100} />
            </h3>
            <p className="text-gray-300">
              Aurora, particles, beams, and gradient effects
            </p>
          </div>

          <div className="bg-white/10 backdrop-blur-lg rounded-lg p-8">
            <h3 className="text-xl font-bold text-white mb-3">
              <BlurText text="Interactions" delay={100} />
            </h3>
            <p className="text-gray-300">
              Cursors, magnets, and interactive animations
            </p>
          </div>
        </div>
      </div>
    </div>
  );
}
