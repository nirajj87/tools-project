import { Card, CardHeader, CardTitle, CardContent, CardFooter } from "@/components/ui/card";
import { Link } from "@inertiajs/react";

interface CardProps {
  thumbnail: string;
  title: string;
  description: string;
  buttonLabel: string;
  buttonLink: string;
  className?: string; // ✅ Dynamic class prop
}

export default function CardComponent({
  thumbnail,
  title,
  description,
  buttonLabel,
  buttonLink,
  className = "",
}: CardProps) {
  return (
    <Card
      className={`relative bg-white shadow-md border border-gray-200 rounded-lg p-4 text-center transition-all duration-300 transform hover:shadow-xl hover:border-blue-500 hover:scale-101 ${className}`}
    >
      <CardHeader className="flex flex-col items-center">
        <img src={thumbnail} alt={title} className="w-60 h-50 object-cover rounded-md mb-2 transition-transform duration-300 hover:scale-102" />
        <CardTitle className="text-lg font-bold">{title}</CardTitle>
      </CardHeader>
      <CardContent>
        <p className="text-gray-600">{description}</p>
      </CardContent>
      <CardFooter className="mt-4">
        <Link
          href={buttonLink}
          className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300"
        >
          {buttonLabel}
        </Link>
      </CardFooter>
    </Card>
  );
}
